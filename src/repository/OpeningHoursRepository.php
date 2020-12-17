<?php
require_once 'Repository.php';
require_once __DIR__.'/../models/openingHours.php';

class OpeningHoursRepository extends Repository
{
    public function getById($id){
        $stmt = $this->database->connect()->prepare("
            SELECT * FROM public.opening_hours WHERE opening_hours.id=:id
        ");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $array = $stmt->fetch(PDO::FETCH_ASSOC);
        $openingHours = new openingHours(
            $array['mon'],
            $array['tue'],
            $array['wed'],
            $array['thur'],
            $array['fri'],
            $array['sat'],
            $array['sun']
        );
        return $openingHours;
    }
}