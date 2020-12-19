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
            $id,
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
    public function insertById($id,$openingHours){
        $stmt = $this->database->connect()->prepare("
            UPDATE public.opening_hours SET mon=?,tue=?,wed=?,thur=?,fri=?,sat=?,sun=? WHERE opening_hours.id=?
        ");

        $stmt->execute([
            $openingHours->getMon(),
            $openingHours->getTue(),
            $openingHours->getWed(),
            $openingHours->getThur(),
            $openingHours->getFri(),
            $openingHours->getSat(),
            $openingHours->getSun(),
            intval($id)
        ]);
    }
}