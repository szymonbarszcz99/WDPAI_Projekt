<?php
require_once 'Repository.php';

class SessionRepository extends Repository
{
    public function login($user_id){
        $started=new DateTime();
        $started=$started->format('Y-m-d H:i:s');
        $stmt = $this->database->connect()->prepare("
            INSERT INTO session (started,user_id) VALUES (:started,:user_id)
        ");
        $stmt->bindParam(':started',$started,PDO::PARAM_STR);
        $stmt->bindParam(':user_id',$user_id,PDO::PARAM_INT);
        $stmt->execute();
    }

    public function logout($userId){
        $stmt = $this->database->connect()->prepare("
            DELETE FROM session WHERE user_id=:id
        ");
        $stmt->bindParam(':id',$userId,PDO::PARAM_INT);
        $stmt->execute();
    }
}