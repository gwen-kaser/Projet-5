<?php

session_start();

require ('controller/website.php');

try {
    if (isset($_GET['action'])) {
        
        if ($_GET['action'] == 'home') {
            $website = new Website();
            $website->home();
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