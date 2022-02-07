<?php $title = 'Nuits insolites/accueil'; ?>

<?php ob_start(); ?>

    <!--Accueil-->
    <div class="img mb-5" style="background: url(public/images/home.jpg) no-repeat center center fixed; background-size: cover; height: 100vh;" alt="Paysage insolite;">
        <div class="logo text-center py-5">
            <img class="img-fluid mb-5" src="public/images/logo.png" alt="logo">
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
                    <img class="img-fluid" src="uploads/<?= ($data['image_slider']) ?>" alt>
                </div>
                <div class="col-md-5">
                    <div class="text-block">
                        <h4 class="font-weight-light"><?= htmlspecialchars($data['title']) ?></h4>
                        <p><?= htmlspecialchars($data['content']) ?></p>
                        
                        <!-- Condition si le membre est connecté il peut accéder à la destination -->
                        <?php if (isset($_SESSION['id'])) { ?>
                            <a href="index.php?action=destination&amp;id=<?= $data['id'] ?>"><i class="fal fa-arrow-circle-right fa-2x"></i></a>
                        <?php } else { ?> 
                            <a href="index.php?action=connexion"><i class="fal fa-arrow-circle-right fa-2x"></i></a>
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