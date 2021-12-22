<?php

require_once('model/DestinationManager.php');

class Admin {

    // Page gestion des destination
    public function listDestinationsAdminView() {

        if (isset($_SESSION['admin']) && $_SESSION['admin'] == true) { // Sécurité pour que uniquement l'admin puisse ajouter une destination
        
            require('view/frontend/listDestinationsAdmin.php');
        }
    }

    // Page d'ajout d'une destination
    public function addDestinationView() 
    {
        if (isset($_SESSION['admin']) && $_SESSION['admin'] == true) { // Sécurité pour que uniquement l'admin puisse ajouter une destination

            require('view/frontend/addDestination.php');
        }
    }

    // Méthode pour ajouter une destination
    public function addDestination ($userId, $title, $content, $image_slider, $image_home, $latitude, $longitude)
    { 
        if (isset($_SESSION['admin']) && $_SESSION['admin'] == true) { // Sécurité pour que uniquement l'admin puisse ajouter une destination
        
            $destinationManager = new DestinationManager();
                    
            $id = $destinationManager->addDestination($userId, $title, $content, $latitude, $longitude);
            
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
                        $destinationManager->addImage($image_slider['name'], $image_home['name'], $id);
                    }
                }
            }
            
            // Boucle pour enregistrer plusieurs images
            foreach($_FILES as $file) {

                // Vérification de l'image du slider
                if (isset($_FILES['image_slider']) && $_FILES['image_slider']['error'] == 0) {
                    
                    // La taille du fichier
                    if ($_FILES['image_slider']['size'] <= 1000000) {
                        
                        // L'autorisation de l'extension
                        $fileInfo = pathinfo($_FILES['image_slider']['name']);
                        $extension = $fileInfo['extension'];
                        $allowedExtension = ['jpg', 'jpeg', 'gif', 'png'];

                        if (in_array($extension, $allowedExtension)) {

                            // Validation et stockage du fichier 
                            move_uploaded_file($_FILES['image_slider']['tmp_name'], 'uploads/' .
                            basename($_FILES['image_slider']['name']));

                            // Enregistrement dans la bdd
                            $destinationManager->addImage($image_slider['name'], $image_home['name'], $id);
                        }
                    }
                }
            }

            if ($id === false) {
                throw new Exeption('Impossible d\'ajouter la destination !');
            }
            else {
                header('Location: index.php?action=listDestinationsAdminView'); 
            }
        }
    }
}