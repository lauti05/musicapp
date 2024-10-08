<?php
class ArtistsModel { 
    private $db = DB;

    public function getArtists(): array{
        $query = $this->db->prepare("SELECT * FROM artist");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }
    public function getArtistByName($artist){
        $query = $this->db->prepare("SELECT EXISTS(SELECT 1 FROM artist WHERE artist_name = :artist)");
        $query->execute($artist);
        return $query->fetchColumn();
    }
    public function exists($artist){
        $query = $this->db->prepare("SELECT EXISTS(SELECT 1 FROM artist WHERE artist_name = :artist)");
        $query->bindParam(':artist', $artist);
        $query->execute();
        return (bool) $query->fetchColumn(); 
    }
}
?>