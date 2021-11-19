<?php

session_start();

require('controller/Website.php');
require('controller/Member.php');
require('controller/Admin.php');

try {
    if (isset($_GET['action'])) {
        // Page d'accueil
        if ($_GET['action'] == 'home') {
            $website = new Website();
            $website->home();
        }
        
        // Page destination
        if ($_GET['action'] == 'destination') {
            $website = new Website();
            $website->destination();
        }

        //Espace admin
        // Page gestion des destination
        if ($_GET['action'] == 'listDestinationsAdminView') {
            $admin = new Admin();
            $admin->listDestinationsAdminView();
        }

        // Page d'ajout d'une destination
        if ($_GET['action'] == 'addDestinationView') {
            $admin = new Admin();
            $admin->addDestinationView();
        }

        // L'ajout d'une nouvelle destination
        // Vérification qu'il y a une connection + champs remplis
        elseif ($_GET['action'] == 'addDestination') {
            if (!empty($_SESSION['id']) && !empty($_POST['title']) && !empty($_POST['content']) && !empty($_POST['image']) && !empty($_POST['image_home']) && !empty($_POST['latitude']) && !empty($_POST['longitude'])) {
                $admin = new Admin();
                $admin->addDestination($_SESSION['id'], $_POST['title'], $_POST['content'], $_POST['image'], $_POST['image_home'], $_POST['latitude'], $_POST['longitude']);
            }
            else {
                throw new Exception('Tous les champs ne sont pas remplis !');
            }
        }
        
        // Espace membres
        // Connexion
        if ($_GET['action'] == 'connexionView') {
            $member = new Member();
            $member->connexionView();
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
        if ($_GET['action'] == 'registrationView') {
            $member = new Member();
            $member->registrationView();
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
        $website->home();   
    }
}
catch(Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}