<?php

class SongsModel {
    private $db = DB;
    public function getSongs():array {
        $query = $this->db->prepare("SELECT * FROM song;");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function getSongById($id){
        $query = $this->db->prepare("SELECT * FROM song WHERE song_id = :id");
        $query->bindParam(':id', $id);
        $query->execute();
        return $query->fetch(PDO::FETCH_OBJ);
    }

    public function exists($id){
        $query = $this->db->prepare("SELECT EXISTS(SELECT 1 FROM song WHERE song_id = :id)");
        $query->bindParam(':id', $id); //evita inyecciones sql tratando los param como datos y no como consulta
        $query->execute();
        return (bool) $query->fetchColumn(); 
    }
}