<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset = "utf-8" />
        
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
       
        <link rel="stylesheet"
        href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
        crossorigin="anonymous">

        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
        
        <link href="public/css/bootstrap.min.css" rel="stylesheet" />
        <link href="public/css/bootstrap.css" rel="stylesheet" />
       
        <title><?= $title ?></title>
    </head>
    <body>
    
    <!--Navbar-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid ">
            <a class="navbar-brand" href="index.php">
                <img src="public/images/logo.png" width="90" height="60" alt="Site logo">
            </a>
            <ul class="navbar-nav me-auto"></ul>
            
            <a class="nav-link text-light" href="#">S'inscrire</a> |
            <a class="nav-link text-light" href="#">Se connecter</a> 
        </div>
    </nav>
    
    <!-- Contenu -->
    <?= $content ?>

    <!--Footer-->
    <div class="text-center py-5">  
        <a href="index.php?action=contact" class="btn btn-sm border border-primary active" role="button" aria-pressed="true">NOUS CONTACTER</a>
    </div>

    <div class="footer mt-5 border text-dark bg-primary">
        <div class="row py-5 text-center">
            <div class="col">
                <a href=""><i class="fab fa-facebook-f fa-lg text-light mr-5 fa-2x"></i></a>
                <a href=""><i class="fab fa-twitter fa-lg text-light mr-5 fa-2x"></i></a>
                <a href=""><i class="fab fa-instagram fa-lg text-light fa-2x"></i></a>
            </div>
        </div>
        <div class="link text-center py-1 bg-light">
            <a class="text-dark" href="#">Paramètres des cookies</a> | <a class="text-dark" href="#">Politique de confidentialité et utilisation des cookies</a> | <a class="text-dark" href="#">Mention légale</a>
        </div>
    </div>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    
    </body>
</html>