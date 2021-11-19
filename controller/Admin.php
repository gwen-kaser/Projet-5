<?php

require_once('model/DestinationManager.php');

class Admin {

    // Page gestion des destination
    public function listDestinationsAdminView() {

        if(isset($_SESSION['admin']) && $_SESSION['admin'] == true) { // Sécurité pour que uniquement l'admin puisse ajouter une destination
        
            require('view/frontend/listDestinationsAdmin.php');
        }
    }

    // Page d'ajout d'une destination
    public function addDestinationView() 
    {
        if(isset($_SESSION['admin']) && $_SESSION['admin'] == true) { // Sécurité pour que uniquement l'admin puisse ajouter une destination

            require('view/frontend/addDestinationView.php');
        }
    }

    // Méthode pour ajouter une destination
    public function addDestination ($userId, $title, $content, $image, $image_home, $latitude, $longitude)
    { 
        if(isset($_SESSION['admin']) && $_SESSION['admin'] == true) { // Sécurité pour que uniquement l'admin puisse ajouter une destination
        
            $destinationManager = new DestinationManager();
                    
            $id = $destinationManager->addDestination($userId, $title, $content, $latitude, $longitude);
            $destinationManager->addImage($image, $image_home, $id);

            if ($id === false) {
                throw new Exeption('Impossible d\'ajouter la destination !');
            }
            else {
                header('Location: index.php?action=home'); 
            }
        }
    }
}