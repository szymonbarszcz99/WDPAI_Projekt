<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/Bookstore.php';
require_once __DIR__.'/../models/openingHours.php';

class BookstoreRepository extends Repository
{
    public function getByCity(string $city){
        $bookstores = [];
        $city = '%' . strtolower($city) . '%';
        $stmt = $this->database->connect()->prepare("
                        SELECT * FROM bookstores WHERE LOWER(address) LIKE :search OR LOWER(name) LIKE :search
        ");
        $stmt->bindParam(':search',$city,PDO::PARAM_STR);
        $stmt->execute();

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
            SELECT * FROM full_info WHERE id=:id
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
        $opening_hours=new openingHours(
            $bookstore->getId(),
            $array['mon'],
            $array['tue'],
            $array['wed'],
            $array['thur'],
            $array['fri'],
            $array['sat'],
            $array['sun']
        );
        return array($bookstore,$opening_hours);
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
            SELECT * FROM quick_info WHERE LOWER(address) LIKE :search OR LOWER(name) LIKE :search
        ');
        $stmt->bindParam(':search', $searchString, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function updateRate($id,$sumOfRates,$numberOfRates){

        $rate=($sumOfRates)/($numberOfRates*5.0);
        $stmt = $this->database->connect()->prepare('
            UPDATE bookstores SET rate = :rate WHERE bookstores.id = :id
         ');
        $stmt->bindParam(':rate', $rate, PDO::PARAM_STR);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }
    public function getRateById($id){
        $stmt = $this->database->connect()->prepare('
            SELECT rate FROM bookstores WHERE id=:id
        ');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}