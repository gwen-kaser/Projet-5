<?php $title = 'Contact'; ?>

<?php ob_start(); ?>

    <div class="jumbotron jumbotron-fluid" style="background: url(public/images/home.jpg) no-repeat center center fixed; background-size: cover;">
        <div class="container py-5 text-center">
            <img class="img-fluid mb-5" src="public/images/logo.png" alt>
        </div>
    </div>

    <div class="container text-center py-5">
        <div class="jumbotron bg-light border border-primary border border-top-0 border border-end-0"> 
            <h3 class="font-weight-light font-italic">CONTACTEZ-NOUS</h3>
            <p class="font-italic pt-2">Vous recherchez la  </p>
        </div>
    </div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>