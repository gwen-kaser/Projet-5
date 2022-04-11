<?php

require_once('model/DestinationManager.php');

class Admin {

    // Méthode pour afficher les destinations
    public function listDestinationsAdmin() 
    {
        $destinationManager = new \Gwen\P5\Model\DestinationManager();
        
        if (isset($_SESSION['admin']) && $_SESSION['admin'] == true) { // Sécurité pour que uniquement l'admin puisse accéder à la gestion des destinations
        
            $destinations = $destinationManager->getDestinations();

            require('view/frontend/listDestinationsAdmin.php');
        }
    }

    // Page d'ajout d'une destination
    public function addDestinationView() 
    {
        if (isset($_SESSION['admin']) && $_SESSION['admin'] == true) { // Sécurité pour que uniquement l'admin puisse accéder à la page de l'ajout d'une destination

            require('view/frontend/addDestination.php');
        }
    }

    // Méthode pour ajouter une destination
    public function addDestination($userId, $title, $content, $image_slider, $image_home, $latitude, $longitude, $address, $price, $link)
    { 
        $destinationManager = new \Gwen\P5\Model\DestinationManager();

        if (isset($_SESSION['admin']) && $_SESSION['admin'] == true) { // Sécurité pour que uniquement l'admin puisse ajouter une destination
                    
            $id = $destinationManager->addDestination($userId, $title, $content, $latitude, $longitude, $address, $price, $link);
            
            // Vérification de l'image d'accueil
            if (isset($_FILES['image_home']) && $_FILES['image_home']['error'] == 0) {
                
                // La taille du fichier
                if ($_FILES['image_home']['size'] <= 1000000) {
                    
                    // L'autorisation de l'extension
                    $fileInfo = pathinfo($_FILES['image_home']['name']);
                    $extension = $fileInfo['extension'];
                    $allowedExtension = ['jpg', 'jpeg', 'gif', 'png'];

                    if (in_array($extension, $allowedExtension)) {

                        // Validation et stockage du fichier 
                        move_uploaded_file($_FILES['image_home']['tmp_name'], 'uploads/' .
                        basename($_FILES['image_home']['name']));
                        
                        // Enregistrement dans la bdd
                        $destinationManager->addImage($_FILES['image_home']['name'], 1, $id);
                    }
                }
            }
            
            // Boucle pour enregistrer plusieurs images / slider
            for($i=0; $i<count($_FILES['image_slider']['name']);$i++) {

                // Vérification de l'image du slider
                if (isset($_FILES['image_slider']) && $_FILES['image_slider']['error'][$i] == 0) {
                    
                    // La taille du fichier
                    if ($_FILES['image_slider']['size'][$i] <= 1000000) {
                        
                        // L'autorisation de l'extension
                        $fileInfo = pathinfo($_FILES['image_slider']['name'][$i]);
                        $extension = $fileInfo['extension'];
                        $allowedExtension = ['jpg', 'jpeg', 'gif', 'png'];

                        if (in_array($extension, $allowedExtension)) {

                            // Validation et stockage du fichier 
                            move_uploaded_file($_FILES['image_slider']['tmp_name'][$i], 'uploads/' .
                            basename($_FILES['image_slider']['name'][$i]));

                            // Enregistrement dans la bdd 
                            $destinationManager->addImage($_FILES['image_slider']['name'][$i], 0, $id);
                        }
                    }
                }
            }

            if ($id === false) {
                throw new Exeption('Impossible d\'ajouter la destination !');
            }
            else {
                header('Location: index.php?action=listDestinationsAdmin'); 
            }
        }
    }

    // Méthode pour afficher la destination à modifier
    public function displayEditDestination()
    {
        $destinationManager = new \Gwen\P5\Model\DestinationManager();

        if (isset($_SESSION['admin']) && $_SESSION['admin'] == true) { // Sécurité pour que uniquement l'admin puisse accéder à la page de la modifification d'une destination

            $destination = $destinationManager->getDestination($_SESSION['id'], $_GET['id']);
            $images = $destinationManager->getImages($_GET['id']);

            require('view/frontend/editDestination.php');
        }
    }

    // Méthode pour modifier la destination
    public function editDestination($id, $title, $content, $image_slider, $image_home, $latitude, $longitude, $address, $price, $link)
    {
        $destinationManager = new \Gwen\P5\Model\DestinationManager();

        if (isset($_SESSION['admin']) && $_SESSION['admin'] == true) { // Sécurité pour que uniquement l'admin puisse modifier une destination

            $destinationManager->editDestination($id, $title, $content, $latitude, $longitude, $address, $price, $link);
            
            // L'ajout de l'image d'acceuil
            // Vérification de l'image d'accueil
            if (isset($_FILES['image_home']) && $_FILES['image_home']['error'] == 0) {
                
                // La taille du fichier
                if ($_FILES['image_home']['size'] <= 1000000) {
                            
                    // L'autorisation de l'extension
                    $fileInfo = pathinfo($_FILES['image_home']['name']);
                    $extension = $fileInfo['extension'];
                    $allowedExtension = ['jpg', 'jpeg', 'gif', 'png'];
        
                    if (in_array($extension, $allowedExtension)) {
        
                        // Validation et stockage du fichier 
                        move_uploaded_file($_FILES['image_home']['tmp_name'], 'uploads/' .
                        basename($_FILES['image_home']['name']));
                                
                        // Enregistrement dans la bdd
                        $destinationManager->addImage($_FILES['image_home']['name'], 1, $id);
                    }
                }
            }
            // L'ajout des images du slider
            // Boucle pour enregistrer plusieurs images / slider
            for ($i=0; $i<count($_FILES['image_slider']['name']);$i++) {
        
                // Vérification de l'image du slider
                if (isset($_FILES['image_slider']) && $_FILES['image_slider']['error'][$i] == 0) {
                            
                    // La taille du fichier
                    if ($_FILES['image_slider']['size'][$i] <= 1000000) {
                                
                        // L'autorisation de l'extension
                        $fileInfo = pathinfo($_FILES['image_slider']['name'][$i]);
                        $extension = $fileInfo['extension'];
                        $allowedExtension = ['jpg', 'jpeg', 'gif', 'png'];
        
                        if (in_array($extension, $allowedExtension)) {
        
                            // Validation et stockage du fichier 
                            move_uploaded_file($_FILES['image_slider']['tmp_name'][$i], 'uploads/' .
                            basename($_FILES['image_slider']['name'][$i]));
        
                            // Enregistrement dans la bdd 
                            $destinationManager->addImage($_FILES['image_slider']['name'][$i], 0, $id);
                        }
                    }
                }
            }
            
            // Suppression de plusieurs images
            $tableauImages = explode(';', substr($_POST['delete-img'],1));
            foreach ($tableauImages as $deleteImg) { 
                $delImage = $destinationManager->deleteImages($deleteImg);
            }
            
            if ($id === false) {
                throw new Exeption('Impossible d\'ajouter la destination !');
            }
            else {
                header('Location: index.php?action=listDestinationsAdmin'); 
            }
        }
    }

    // Méthode pour supprimer une destination
    public function deleteDestination($id) 
    {
        $destinationManager = new \Gwen\P5\Model\DestinationManager();

        if (isset($_SESSION['admin']) && $_SESSION['admin'] == true) { // Sécurité pour que uniquement l'admin puisse supprimer une destination

            $delDestination = $destinationManager->deleteDestination($id);
            $delImage = $destinationManager->deleteImgDestination($id);

            header('Location: index.php?action=listDestinationsAdmin');
        }
    }   
}