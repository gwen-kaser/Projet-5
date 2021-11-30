<?php

require_once("model/Manager.php");

class DestinationManager extends Manager 
{
    // Requête pour ajouter une destination / gestion administrateur
    public function addDestination($userId, $title, $content, $latitude, $longitude)
    {
        $db = $this->dbConnect();
        $destinations = $db->prepare('INSERT INTO destinations(title, user_id, content, created_date, latitude, longitude) VALUES(?, ?, ?, NOW(), ?, ?)');
        $destinations->execute(array($title, $userId, $content, $latitude, $longitude));
        
        return $db->lastInsertId();
    }

    public function addImage($image_slider, $image_home, $destination_id)
    {
        $db = $this->dbConnect();
        $destinations = $db->prepare('INSERT INTO images(image_slider, image_home, destination_id) VALUES(?, ?, ?)');
        $destinations->execute(array($image_slider, 1, $destination_id));
        
        return $db->lastInsertId();

    }

}