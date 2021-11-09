<?php

class Website 
{
    // Afficher page d'accueil
    public function home () 
    {
        require ('view/frontend/listDestinationsView.php');
    }

    // Afficher page destination
    public function destination ()
    {
        require ('view/frontend/destinationView.php');
    }
    
}