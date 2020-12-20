<?php
require_once 'Repository.php';
require_once __DIR__.'/../models/Owner.php';


class OwnerRepository extends Repository
{
    public function getByUserIdAndBookstoreId($userId,$bookstoreId){
        $stmt = $this->database->connect()->prepare("
            SELECT * FROM public.owner WHERE owner.user_id=:uid AND owner.bookstore_id=:bid
        ");
        $stmt->bindParam(':uid', $userId, PDO::PARAM_INT);
        $stmt->bindParam(':bid', $bookstoreId, PDO::PARAM_INT);

        $stmt->execute();
        $array = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($array == false) {
            return false;
        }
        else return true;
    }
}