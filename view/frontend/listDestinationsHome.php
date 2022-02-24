<?php $title = 'Nuits insolites/accueil'; ?>

<?php ob_start(); ?>

    <!--Accueil-->
    <div class="img mb-5" style="background: url(public/images/home.jpg) no-repeat center center fixed; background-size: cover; height: 100vh;" alt="Paysage insolite;">
        <div class="logo text-center py-5">
            <img class="img-fluid mb-5" src="public/images/logo.png" alt="logo">
        </div>
    </div>  

    <div class="container text-center py-5">
        <div class="jumbotron bg-light border border-primary border border-top-0 border border-end-0"> 
            <h3 class="font-weight-light font-italic">NUITS INSOLITES VOUS SOUHAITE LA BIENVENUE</h3>
            <p class="font-italic pt-2">
            Êtes-vous à la recherche de destination de rêve pour passer une nuit innoubliable ?<br/>
            Inscrivez-vous ou connectez-vous pour découvrir une sélection d'hôtels qui ne vous laissera pas indifférant ! 
            </p> 
        </div>
    </div>

    <!--Affichage des destinations-->
    <?php
    while ($data = $destinations->fetch())
    {
    ?>
        <div class="container py-5">
            <div class="row mb-5">
                <div class="col-md-4 offset-md-2">
                    <img class="img-fluid" src="uploads/<?= ($data['image_slider']) ?>" alt="Nuits insolites">
                </div>
                <div class="col-md-5">
                    <div class="text-block">
                        <h4 class="font-weight-light"><?= htmlspecialchars($data['title']) ?></h4>
                        <?php 
                            if(strlen($data['content']) > 200) { 
                            $data['content'] = substr($data['content'], 0, 200).'...'; } 
                        ?>
                        <p><?= htmlspecialchars($data['content']) ?></p>
                        
                        <!-- Condition si le membre est connecté il peut accéder à la destination -->
                        <?php if (isset($_SESSION['id'])) { ?>
                            <a href="index.php?action=destination&amp;id=<?= $data['id'] ?>"><i class="fa-solid fa-arrow-right-long fa-2x"></i></a>
                        <?php } else { ?> 
                            <a href="index.php?action=connexion"><i class="fa-solid fa-arrow-right-long fa-2x"></i></a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    <?php
    }
    $destinations->closeCursor();
    ?>  

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>