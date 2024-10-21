<?php
class ArtistsModel { 
    private $db;
    public function __construct(){
        $this->db = new PDO(DSN, USERNAME, '');
    }
    public function getArtists(){ 
        $query = $this->db->prepare('SELECT * FROM artist');
        $query->execute();

        $artists = $query->fetchAll(PDO::FETCH_OBJ);
        return $artists;
    }
    public function getArtistById($artist_id){
        $query = $this->db->prepare('SELECT * FROM artist WHERE artist_id = ?'); 
        $query->execute([$artist_id]);;
        $artistbyid = $query->fetch(PDO::FETCH_OBJ);
        return $artistbyid; 
    }
    function insertArtist($artist_name, $artist_img){
        $query = $this->db->prepare('INSERT INTO artist(artist_name, artist_img) VALUES (?,?)');
        $query->execute([$artist_name, $artist_img]);

        return $this->db->lastInsertId();
    }
    public function deleteArtistById($artist_id){
        $query = $this->db->prepare('DELETE FROM artist WHERE artist_id = ?');
        $query->execute([$artist_id]);
    }
    public function updateArtist($artist_id, $artist_name, $artist_img){
        $query = $this->db->prepare('UPDATE artist SET artist_name = ?, artist_img = ? WHERE artist_id = ?');
        $query->execute([$artist_name, $artist_img, $artist_id]);
    }   
}
?>