<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset = "utf-8" />
        
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
       
        <link rel="stylesheet"
        href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
        crossorigin="anonymous">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        
        <link href="public/css/style.css" rel="stylesheet" />
        <link href="public/css/bootstrap.css" rel="stylesheet" />
       
        <title><?= $title ?></title>
    </head>
    <body>
    
        <!--Navbar-->
        <header>
            <nav class="navbar navbar-expend-md navbar-dark bg-primary py-2">
                <a class="navbar-brand" href="index.php">
                    <img src="public/images/logo.png" width="130" alt="Site logo">
                </a>
        
                <!-- Toggler/collapsibe Button -->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
        
                <!-- Si un membre se connecte -->
                <div class="collapse navbar-collapse" id="collapsibleNavbar">
                    <ul class="navbar-nav">
                        <?php if (isset($_SESSION['id']) && isset($_SESSION['pseudo'])): ?>
                        <li class="text-white font-italic mt-3 mb-2">Bonjour <?=($_SESSION['pseudo']);?></li>
                        <li class="nav-item">
                            <a class="nav-link text-light" href="index.php?action=deconnexion">SE DECONNECTER</a>
                        </li>
                        
                        <!-- Si l'administrateur se connect -->    
                        <?php if (isset($_SESSION['admin']) && $_SESSION['admin'] == false): ?>
                        <li class="nav-item">
                            <a class="nav-link text-light" href="index.php?action=destinationsFavorites"> MES DESTINATIONS FAVORITES</a>
                        </li>
                        <?php endif; ?>
                        <?php else: ?>
                        <li class="nav-item">
                            <a class="nav-link text-light" href="index.php?action=registration">S'INSCRIRE</a> 
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light" href="index.php?action=connexion">SE CONNECTER</a> 
                        </li>
                        <?php endif; ?>
                 
                        <!-- Condition si l'administrateur se connect -->
                        <?php if (isset($_SESSION['admin']) && $_SESSION['admin'] == true): ?>
                        <li class="nav-item">
                            <a class="nav-link text-light" href="index.php?action=listDestinationsAdmin">GESTION DES DESTINATIONS</a>
                        </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </nav>
        </header>

        <!-- Contenu -->
        <?= $content ?>
        
        <!-- Footer -->
        <footer>
            <div class="border text-dark bg-primary mt-5">
                <div class="row py-4 text-center">
                    <div class="col">
                        <a href=""><i class="fa-brands fa-facebook-f text-light mr-5 fa-2x"></i></a>
                        <a href=""><i class="fa-brands fa-twitter text-light mr-5 fa-2x"></i></a>
                        <a href=""><i class="fa-brands fa-instagram text-light fa-2x"></i></a>
                    </div>
                </div>
                <div class="link text-center py-2 bg-light">
                    <a class="text-dark" href="#">PARAM??TRES DES COOKIES</a> | <a class="text-dark" href="#">POLITIQUE DE CONFIDENTIALIT?? ET UTILISATION DES COOKIES</a> | <a class="text-dark" href="#">MENTION L??GALE</a>
                </div>
            </div>
        </footer>

        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    
    </body>
</html>