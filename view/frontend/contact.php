<?php $title = 'Contact'; ?>

<?php ob_start(); ?>

    <div class="img" style="background: url(public/images/home.jpg) no-repeat center center fixed; background-size: cover; height: 100vh;" alt="Paysage insolite;">
        <div class="logo text-center">
            <img class="img-fluid" src="public/images/logo.png" alt="logo">
        </div>
    </div> 

    <div class="container py-5 my-5">
        <div class="jumbotron-fluid py-5 px-5 bg-light border border-primary border border-top-0 border border-end-0 shadow"> 
            <h2 class="font-weight-light font-italic">CONTACTEZ-NOUS</h2>
            <p class="font-italic pt-2">
                Nous pouvons vous aidez à trouver votre nuit de rêve !</br>  
                Exprimer vos désires et nous les réaliserons.</br></br>
                <span class="font-italic">nuitsinsolites@gmail.com</span>
            </p>
        </div>
    </div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>