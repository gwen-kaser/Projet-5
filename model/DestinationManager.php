<?php

namespace Gwen\P5\Model;

require_once("model/Manager.php");

class DestinationManager extends Manager 
{
 
    // Requête avec jointure externe pour afficher les destinations + image d'accueil + nombre favoris gestion administrateur
    public function getDestinations()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT destinations.id, destinations.title, destinations.content, destinations.address, destinations.price, destinations.link, images.image_slider, 
        COUNT(favorites.id) numberFavorite
        FROM destinations 
        INNER JOIN images 
        ON images.destination_id = destinations.id 
        AND image_home = 1 
        LEFT JOIN favorites 
        ON favorites.destination_id = destinations.id 
        GROUP BY destinations.id, images.image_slider
        ORDER BY destinations.created_date DESC');
            
        return $req;
    }

    // Requête avec jointure externe pour afficher une destination + enregistrer favoris par utilisateur + afficher la destination et l'image d'accueil à modifier
    public function getDestination($userId, $destinationId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT DISTINCT destinations.id, destinations.title, destinations.content, destinations.latitude, destinations.longitude, destinations.address, destinations.price, destinations.link, favorites.user_id, images.image_slider
        FROM destinations
        INNER JOIN images 
        ON images.destination_id = destinations.id 
        AND image_home = 1  
        LEFT JOIN favorites 
        ON favorites.destination_id = destinations.id 
        AND favorites.user_id = ? 
        WHERE destinations.id = ?');

        $req->execute([$userId, $destinationId]);
        $destination = $req->fetch();

        return $destination;
    }
    
    // Requête pour afficher les images du slider associés à la destination
    public function getImages($destination_id)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT image_slider, image_home, destination_id FROM images WHERE image_home = 0 AND destination_id = ?');
            
        $req->execute([$destination_id]);
        $images = $req->fetchAll();

        return $images;
    }

    // Requête pour ajouter une destination / gestion administrateur
    public function addDestination($userId, $title, $content, $latitude, $longitude, $address, $price, $link)
    {
        $db = $this->dbConnect();
        $destinations = $db->prepare('INSERT INTO destinations(title, user_id, content, latitude, longitude, address, price, link) VALUES(?, ?, ?, ?, ?, ?, ?, ?)');
        $destinations->execute([$title, $userId, $content, $latitude, $longitude, $address, $price, $link]);
        
        return $db->lastInsertId();
    }
    
    // Requête pour ajouter les images / gestion administrateur
    public function addImage($image_slider, $image_home, $destination_id)
    {
        $db = $this->dbConnect();
        $destinations = $db->prepare('INSERT INTO images(image_slider, image_home, destination_id) VALUES(?, ?, ?)');
        $destinations->execute([$image_slider, $image_home, $destination_id]);
        
        return $db->lastInsertId();
    }

    // Requête pour modifier une destination / gestion administrateur
    public function editDestination($id, $title, $content, $latitude, $longitude, $address, $price, $link)
    {
        $db = $this->dbConnect();
        $destinations = $db->prepare('UPDATE destinations SET title = ?, content = ?, latitude = ?, longitude = ?, address = ?, price = ?, link = ? WHERE id = ?');
        $destinations->execute([$title, $content, $latitude, $longitude, $address, $price, $link, $id]);
    }

    // Requête pour supprimer une destination / gestion administrateur
    public function deleteDestination($id)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('DELETE FROM destinations WHERE id = ?');
        $delDestination = $req->execute([$id]);
    
        return $delDestination;
    }

    // Requête pour supprimer les images associés à la destination
    public function deleteImage($id) 
    {
        $db = $this->dbConnect();
        $req = $db->prepare('DELETE FROM images WHERE id = ?');
        $delImage = $req->execute([$id]);

        return $delImage;
    }

    // Requête avec jointure interne pour afficher les destinations favorites de chaque utilisateur
    public function getDestinatonsFavorites($userId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT destinations.id, destinations.title, destinations.content, destinations.address, destinations.price, destinations.link, favorites.user_id, images.image_slider
        FROM destinations
        INNER JOIN favorites 
        ON favorites.destination_id = destinations.id
        AND favorites.user_id = ?
        INNER JOIN images
        ON images.destination_id = destinations.id
        AND image_home = 1');
        $req->execute([$userId]);

        return $req;
    }

    // Requête pour ajouter une destinaton favorite
    public function addFavorite($destinationId, $userId) 
    {
        $db = $this->dbConnect();
        $favorites = $db->prepare('INSERT INTO favorites(destination_id, user_id) VALUE(?, ?)');
        $favorites->execute([$destinationId, $userId]);
    }

    // Requête pour supprimer la destination favorites
    public function deleteFavorite($destinationId, $userId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('DELETE FROM favorites 
        WHERE destination_id = ? AND user_id = ?');
        $req->execute([$destinationId, $userId]);

        return $req;
    }

}