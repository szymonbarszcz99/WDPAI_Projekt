<?php

require_once 'Repository.php';
require_once 'RatesRepository.php';
require_once __DIR__.'/../models/Bookstore.php';
require_once __DIR__.'/../models/openingHours.php';

class BookstoreRepository extends Repository
{
    public function getByCity(string $city){
        $bookstores = [];
        $stmt = $this->database->connect()->prepare("
            SELECT * FROM public.bookstores WHERE address like ?
        ");

        $stmt->execute(array("%".$city."%"));

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if($result==false){
            return null;
        }
        else{
            foreach ($result as $oneResult){
                $bookstores[] = new Bookstore(
                    $oneResult['id'],
                    $oneResult['name'],
                    $oneResult['rate'],
                    $oneResult['address'],
                    $oneResult['telephone'],
                    $oneResult['site'],
                    $oneResult['opening_hours_id'],
                    $oneResult['description'],
                    $oneResult['photos']
                );
            }
            return $bookstores;
        }
    }
    public function getAllData($id){
        $stmt = $this->database->connect()->prepare("
            SELECT * FROM public.bookstores LEFT JOIN public.opening_hours on bookstores.opening_hours_id=opening_hours.id WHERE bookstores.id=:id
        ");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $array = $stmt->fetch(PDO::FETCH_ASSOC);
        $bookstore = new Bookstore(
            $id,
            $array['name'],
            $array['rate'],
            $array['address'],
            $array['telephone'],
            $array['webpage'],
            $array['opening_hours_id'],
            $array['description'],
            $array['photos']
        );

        return $bookstore;
    }
    public function updateById($bookstore){
        $stmt = $this->database->connect()->prepare("
            UPDATE public.bookstores SET name=?,address=?,telephone=?,webpage=?,description=?,photos=? WHERE id=?
        ");

        $stmt->execute([
            $bookstore->getName(),
            $bookstore->getAddress(),
            $bookstore->getTelephone(),
            $bookstore->getWebpage(),
            $bookstore->getDescription(),
            $bookstore->getPhotos(),
            $bookstore->getId()
        ]);
    }
    public function getByCityFetchApi(string $searchString){
        $searchString = '%' . strtolower($searchString) . '%';

        $stmt = $this->database->connect()->prepare('
            SELECT * FROM bookstores WHERE LOWER(address) LIKE :search OR LOWER(name) LIKE :search
        ');
        $stmt->bindParam(':search', $searchString, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function updateRate($id, $stars){

        $ratesRepository = new RatesRepository();
        $ratesRepository->updataNumberOfRates($id);
        $numberOfRates=$ratesRepository->getNumberOfRates($id);

        $stmt = $this->database->connect()->prepare('
            UPDATE bookstores SET rate = (rate + :stars)/(:numberOfRates) WHERE bookstores.id = :id
         ');
        $stmt->bindParam(':stars',$stars,PDO::PARAM_INT);
        $stmt->bindParam(':numberOfRates', $numberOfRates, PDO::PARAM_INT);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $stmt = $this->database->connect()->prepare('
            SELECT rate FROM bookstores WHERE id=:id
         ');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}