<?php
class UserModel {
    private $db;

    public function __construct(){
        $this->db = new PDO(DSN, USERNAME, '');
    }
    public function exists($username){
        $query = $this->db->prepare("SELECT EXISTS (SELECT 1 FROM user WHERE user_name = :username)");
        $query->bindParam(':username', $username);
        $query->execute();
        return (bool) $query->fetchColumn();
    }

    public function getUser($username): object {
        $query = $this->db->prepare("SELECT * FROM user WHERE user_name = :username");
        $query->bindParam(':username', $username);
        $query->execute();
        return $query->fetch(PDO::FETCH_OBJ);
    }
}