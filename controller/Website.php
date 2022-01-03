<?php

require_once('model/DestinationManager.php');

class Website 
{
    // Afficher la listes des destinations / page d'accueil
    public function listDestinationsHome () 
    {
        $destinationManager = new DestinationManager(); 
        
        $destinations = $destinationManager->getDestinations();

        require ('view/frontend/listDestinationsHome.php');
    }

    // Afficher page destination
    public function destination ()
    {
        $destinationManager = new DestinationManager();
        
        $destination = $destinationManager->getDestination($_GET['id']);
        $images = $destinationManager->getImages();
        
        require ('view/frontend/destination.php');
    }
    
}