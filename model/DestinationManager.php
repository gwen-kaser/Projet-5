<?php

require_once("model/Manager.php");

class DestinationManager extends Manager 
{
 
    // Requête pour afficher les destinations + image home / page d'acceuil + gestion administrateur
    public function getDestinations()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT destinations.id, destinations.title, destinations.content, images.image_slider
        FROM destinations
        INNER JOIN images 
        ON images.destination_id = destinations.id
        AND image_home = 1');
            
        return $req;
    }

    // Requête pour afficher une destination
    public function getDestination($destinationId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, title, content, latitude, longitude FROM destinations WHERE id = ?');

        $req->execute(array($destinationId));
        $destination = $req->fetch();

        return $destination;
    }
    
    // Requête pour afficher les images
    public function getImages($destination_id)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT image_slider, image_home, destination_id FROM images WHERE image_home = 0 AND destination_id = ?');
            
        $req->execute(array($destination_id));
        $images = $req->fetchAll();

        return $images;
    }

    // Requête pour ajouter une destination / gestion administrateur
    public function addDestination($userId, $title, $content, $latitude, $longitude)
    {
        $db = $this->dbConnect();
        $destinations = $db->prepare('INSERT INTO destinations(title, user_id, content, created_date, latitude, longitude) VALUES(?, ?, ?, NOW(), ?, ?)');
        $destinations->execute(array($title, $userId, $content, $latitude, $longitude));
        
        return $db->lastInsertId();
    }
    
    // Requête pour ajouter les images / gestion administrateur
    public function addImage($image_slider, $image_home, $destination_id)
    {
        $db = $this->dbConnect();
        $destinations = $db->prepare('INSERT INTO images(image_slider, image_home, destination_id) VALUES(?, ?, ?)');
        $destinations->execute(array($image_slider, $image_home, $destination_id));
        
        return $db->lastInsertId();

    }

    // Requête pour supprimer un chapitre / gestion administrateur
    public function deleteDestination($id)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('DELETE FROM destinations WHERE id = ?');
        $delDestination = $req->execute(array($id));
    
        return $delDestination;
    }

    // Requête pour supprimer les images associés à la destination
    public function deleteImage($id) 
    {
        $db = $this->dbConnect();
        $req = $db->prepare('DELETE FROM images WHERE id = ?');
        $delImage = $req->execute(array($id));

        return $delImage;
    }

    // Requête pour ajouter une destinaton favorite
    public function addFavorite($destinationId, $userId) 
    {
        $db = $this->dbConnect();
        $favorites = $db->prepare('INSERT INTO favorites(destination_id, user_id) VALUE(?, ?)');
        $favorites->execute(array($destinationId, $userId));
    }

}