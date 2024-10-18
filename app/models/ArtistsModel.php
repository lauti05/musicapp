<?php
class ArtistsModel { 
    private $db = DB;

    //sino podría hacer función __construct acá

    public function getArtists(): array { 
        $query = $this->db->prepare("SELECT * FROM artist"); 
        $query->execute();
        $artists = $query->fetchAll(PDO::FETCH_OBJ);
        return $artists;
    }

    public function getArtistById($artist_id) {
        $query = $this->db->prepare("SELECT * FROM artist WHERE artist_id = ?"); 
        $query->execute([$artist_id]);
        $artistbyid = $query->fetch(PDO::FETCH_OBJ);
        
        return $artistbyid;
    }

    public function exists($artist){
        $query = $this->db->prepare("SELECT EXISTS(SELECT 1 FROM artist WHERE artist_id = ?");
        $query->bindParam(':artist', $artist);
        $query->execute();
        return (bool) $query->fetchColumn(); 
    }

    function insertArtist($artist_name, $artist_img){ //acá podríamos sanitizar htmlspecialchars
        $query = $this->db->prepare('INSERT INTO artist (artist_name, artist_img) VALUES (?,?)'); //objeto protegido
        $query->execute([$artist_name, $artist_img]);

        return $this->db->lastInsertId();
    }

    public function deleteArtistById($artist_id){
        $query = $this->db->prepare('DELETE FROM artist WHERE artist_id = ?');
        $query->execute([$artist_id]);
    }

    public function updateArtist($artist_id, $artist_name){
        $query = $this->db->prepare('UPDATE artist SET artist_name = ? WHERE artist_id = ?');
        $query->execute([$artist_name, $artist_id]);
    }  

    public function getSongsbyArtist($artist_id){
        $query = $this->db->prepare("SELECT * FROM song WHERE artist_id = ?"); 
        $query->execute([$artist_id]);
        $songsbyArtist = $query->fetchAll(PDO::FETCH_OBJ);
        return $songsbyArtist;
    }
}
?>