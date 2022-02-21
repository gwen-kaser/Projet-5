<?php

require_once('model/DestinationManager.php');

class Website 
{
    // Méthode pour afficher la listes des destinations / page d'accueil
    public function listDestinationsHome () 
    {
        $destinationManager = new DestinationManager(); 
        
        $destinations = $destinationManager->getDestinations();

        require ('view/frontend/listDestinationsHome.php');
    }

    // Méthode pour afficher une destination
    public function destination ()
    {
        if(!isset($_SESSION['id'])) { // Sécurité si ce n'est pas un membre redirection vers la page de connexion
            header('Location: index.php?action=connexion');
            die();
        }
        
        $destinationManager = new DestinationManager();
            
        $destination = $destinationManager->getDestination($_SESSION['id'], $_GET['id']);
        $images = $destinationManager->getImages($_GET['id']);

        require ('view/frontend/destination.php');
    }

    // Méthode pour afficher les destinations favorites
    public function destinationsFavorites()
    {
        if(!isset($_SESSION['id'])) { // Sécurité si ce n'est pas un membre redirection vers la page de connexion
            header('Location: index.php?action=connexion');
            die();
        }

        $destinationManager = new DestinationManager();
        $displayFavorites = $destinationManager->getDestinatonsFavorites($_SESSION['id']);

        require ('view/frontend/destinationsFavorites.php');

    }

    // Méthode pour ajouter une destination favorite
    public function addFavorite($destinationId, $userId)
    {
        if(!isset($_SESSION['id'])) { // Sécurité si ce n'est pas un membre redirection vers la page de connexion
            header('Location: index.php?action=connexion');
            die();
        }
        
        $destinationManager = new DestinationManager();
        $destinationManager->addFavorite($destinationId, $userId);

        header('location: index.php?action=destination&id='. $destinationId);
    }

    public function deleteFavorite($destinationId, $userId)
    {
        if(!isset($_SESSION['id'])) { // Sécurité si ce n'est pas un membre redirection vers la page de connexion
            header('Location: index.php?action=connexion');
            die();
        }

        if (isset($_SESSION['id'])) { // Vérification si l'utilisateur est connecté

            $destinationManager = new DestinationManager;
            $destinationManager->deleteFavorite($destinationId, $userId);

            header('location: index.php?action=destinationsFavorites');
        }
    }

}