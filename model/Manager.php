<?php

class Manager
{
    // Connexion bdd
    protected function dbConnect()
    {
        $db = new PDO('mysql:host=localhost;dbname=p5;charset=utf8', 'root', 'root');
        
        return $db;
    }
}