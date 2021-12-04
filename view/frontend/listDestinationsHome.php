<?php $title = 'Nuits insolites/accueil'; ?>

<?php ob_start(); ?>

    <!--Accueil-->
    <div class="img mb-5" style="background: url(public/images/home.jpg) no-repeat center center fixed; background-size: cover; height: 100vh;" alt="Paysage insolite;">
        <div class="logo text-center py-5">
            <img class="img-fluid mb-5" src="public/images/logo.png" alt="logo">
        </div>
    </div>  

    <!--Destinations-->
    <div class="container py-5">
        <div class="row mb-5">
            <div class="col-md-4 offset-md-2">
                <img class="img-fluid" src="public/images/bahamas-under-the-sea-hotel-1.jpg" alt>
            </div>
            <div class="col-md-5">
                <div class="text-block">
                    <h4 class="font-weight-light">BORABORA, PILOTIS PALACE</h4>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Omnis laudantium at debitis veniam recusandae ipsam saepe fugit qui!</p>
                    <a href="index.php?action=destination"><i class="fal fa-arrow-circle-right fa-2x"></i></a>
                </div>
            </div>
        </div>
    </div>   

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>