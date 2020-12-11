<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/Bookstore.php';
class BookstoreRepository extends Repository
{
    public function getByCity(string $city){
        $stmt = $this->database->connect()->prepare("
            SELECT * FROM public.bookstores WHERE address like ?
        ");

        $stmt->execute(array("%".$city."%"));

        $bookstores = $stmt->fetchAll();
        if($bookstores==false){
            return null;
        }
        else{
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
        return $array;
    }
}