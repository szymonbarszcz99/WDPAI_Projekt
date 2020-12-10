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

        $bookstores = $stmt->fetch(PDO::FETCH_ASSOC);
        if($bookstores==false){
            return null;
        }
        else{
            return $bookstores;
        }
    }
}