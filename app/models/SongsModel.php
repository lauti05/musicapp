<?php

class SongsModel {
    private $db;
    public function __construct(){
        $this->db = new PDO(DSN, USERNAME, '');
    }
    public function getSongs():array{
        $query = $this->db->prepare("SELECT * FROM song;");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function getSongById($id) {
        $query = $this->db->prepare("SELECT * FROM song WHERE song_id = :id");
        $query->bindParam(':id', $id); //evita inyecciones sql tratando los param como datos y no como consulta
        $query->execute();
        return $query->fetch(PDO::FETCH_OBJ);
    }

    public function exists($id){
        $query = $this->db->prepare("SELECT EXISTS(SELECT 1 FROM song WHERE song_id = :id)");
        $query->bindParam(':id', $id); 
        $query->execute();
        return (bool) $query->fetchColumn(); 
    }

    public function removeSong($id){
        $query = $this->db->prepare("DELETE FROM song WHERE song_id = :id");
        $query->bindParam(':id', $id);
        $query->execute();
    }

    public function updateSong($id, $name, $genre, $year){
        $query = $this->db->prepare("UPDATE song SET song_name = :name, song_genre = :genre, song_year = :year WHERE song_id = :id");
        $query->bindParam(':id', $id); 
        $query->bindParam(':name', $name); 
        $query->bindParam(':genre', $genre); 
        $query->bindParam(':year', $year); 
        $query->execute();
    }

    public function addSong($song){
        $query = $this->db->prepare("INSERT INTO song VALUES (NULL, :artist_id, :song_name, :song_genre, :song_year)"); //valores santizados en controller
        $query->bindParam(':artist_id', $song->artistId);
        $query->bindParam(':song_name', $song->name);
        $query->bindParam(':song_genre', $song->genre);
        $query->bindParam(':song_year', $song->year);
        $query->execute();
    }

    public function songsbyArtist($artist_id){
        $query = $this->db->prepare ('SELECT * FROM song WHERE artist_id = ?');
        $query->execute([$artist_id]);
        $songsbyArtist = $query->fetchAll(PDO::FETCH_OBJ);
        return $songsbyArtist;
    }
   
}