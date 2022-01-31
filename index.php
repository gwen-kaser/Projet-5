<?php

session_start();

require('controller/Website.php');
require('controller/Member.php');
require('controller/Admin.php');

try {
    // Page d'accueil / Liste des destinations
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'listDestinationsHome') {
            $website = new Website();
            $website->listDestinationsHome();
        }
        
        // Page destination
        elseif ($_GET['action'] == 'destination') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $website = new Website();
                $website->destination();
            }
        }

        // Destination favorite
        elseif ($_GET['action'] == 'addFavorite') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (!empty($_SESSION['id'])) {
                    $website = new Website();
                    $website->addFavorite($_GET['id'], $_SESSION['id']);
                }
            }
        }

        //Espace admin
        // Page gestion des destinations
        if ($_GET['action'] == 'listDestinationsAdmin') {
            $admin = new Admin();
            $admin->listDestinationsAdmin();
        }

        // Page d'ajout d'une destination
        if ($_GET['action'] == 'addDestinationView') {
            $admin = new Admin();
            $admin->addDestinationView();
        }

        // L'ajout d'une nouvelle destinationn 
        elseif ($_GET['action'] == 'addDestination') {
            if (!empty($_SESSION['id']) && !empty($_POST['title']) && !empty($_POST['content']) && !empty($_FILES['image_slider']) && !empty($_FILES['image_home']) && !empty($_POST['latitude']) && !empty($_POST['longitude'])) {
                $admin = new Admin();
                $admin->addDestination($_SESSION['id'], $_POST['title'], $_POST['content'], $_FILES['image_slider'], $_FILES['image_home'], $_POST['latitude'], $_POST['longitude']);
            }
            else {
                throw new Exception('Tous les champs ne sont pas remplis !');
            }
        }

        elseif ($_GET['action'] == 'deleteDestination') {
            $admin = new Admin();
            $admin->deleteDestination($_GET['id']);
        }
        
        // Espace membres
        // Connexion
        if ($_GET['action'] == 'connexion') {
            $member = new Member();
            $member->connexion();
        }
        
        elseif ($_GET['action'] == 'connexionUser') {
            if (isset($_POST['pseudo']) && isset($_POST['pass'])) {
                $member = new Member();
                $member->connexionUser($_POST['pseudo'], $_POST['pass']);
            }
            else {
                throw new Exception('Tous les champs ne sont pas remplis !');
                }
            }
        
        // Inscription
        if ($_GET['action'] == 'registration') {
            $member = new Member();
            $member->registration();
        }

        elseif ($_GET['action'] == 'saveUser') {
            if (isset($_POST['pseudo']) && isset($_POST['pass']) && isset($_POST['email'])) {
                $member = new Member();
                $member->saveUser($_POST['pseudo'], $_POST['pass'], $_POST['email']);
            }
            else {
                throw new Exception('Tous les champs ne sont pas remplis !');
            }
        }
        
        // Déconnection
        elseif ($_GET['action'] == 'deconnexion') {
            $member = new Member();
            $member->deconnexion();
        }
        
    }

    else {
        $website = new Website();
        $website->listDestinationsHome();   
    }
}
catch(Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}