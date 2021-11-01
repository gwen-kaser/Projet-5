<?php $title = 'Nuits insolites/accueil'; ?>

<?php ob_start(); ?>

    <!--Accueil-->
    <div class="img mb-5" style="background: url(public/images/home.jpg) no-repeat center center fixed; background-size: cover; height: 100vh;" alt="Paysage insolite;">
        <div class="logo text-center py-5">
            <img class="img-fluid mb-5" src="public/images/logo.png" alt>
        </div>
    </div>  

    <!--Destinations-->
    <div class="container py-5">
        <div class="row mb-5">
            <div class="col-md-4 offset-md-2">
                <img class="img-fluid" src="public/images/borabora-pilotis-palace-1.jpg" alt>
            </div>
            <div class="col-md-5">
                <div class="text-block">
                    <h4>BORABORA, PILOTIS PALACE</h4>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Omnis laudantium at debitis veniam recusandae ipsam saepe fugit qui!</p>
                    <a href="#"><i class="fal fa-arrow-circle-right fa-2x"></i></a>
                </div>
            </div>
        </div>
    </div>
    
    <div class="text-center py-5">  
        <a href="index.php?action=contact" class="btn btn-sm border border-primary active" role="button" aria-pressed="true">NOUS CONTACTER</a>
    </div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>