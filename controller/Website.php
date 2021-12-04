<?php

class Website 
{
    // Afficher page d'accueil
    public function home () 
    {
        require ('view/frontend/listDestinationsHome.php');
    }

    // Afficher page destination
    public function destination ()
    {
        require ('view/frontend/destination.php');
    }
    
}