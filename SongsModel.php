<?php
class SongsModel {
    private $db;
    public function getSongs():array {
        $query = $this->db->prepare("SELECT * FROM song;");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }
}