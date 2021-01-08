<?php
require_once 'Repository.php';
require_once __DIR__.'/../models/Rating.php';

class RatesRepository extends Repository
{
    public function updataRates($id,$stars){
        $stmt = $this->database->connect()->prepare('
            UPDATE rates SET numberOfRates=numberOfRates+1,sumOfRates = sumOfRates + :stars WHERE bookstoreId=:id;
         ');
        $stmt->bindParam(':stars',$stars,PDO::PARAM_INT);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }
    public function getRates($id){
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM rates WHERE bookstoreId=:id;
        ');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $array = $stmt->fetch(PDO::FETCH_ASSOC);
        return $array;

    }
}