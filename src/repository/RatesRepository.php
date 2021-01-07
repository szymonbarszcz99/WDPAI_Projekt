<?php
require_once 'Repository.php';

class RatesRepository extends Repository
{
    public function updataNumberOfRates($id){
        $stmt = $this->database->connect()->prepare('
            UPDATE rates SET "numberOfRates"="numberOfRates"+1 WHERE "bookstoreId"=:id;
         ');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }
    public function getNumberOfRates($id){
        $stmt = $this->database->connect()->prepare('
            SELECT "numberOfRates" FROM rates WHERE "bookstoreId"=:id;
        ');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $numberOfRates = $stmt->fetch(PDO::FETCH_ASSOC);
        return $numberOfRates['numberOfRates'];

    }
}