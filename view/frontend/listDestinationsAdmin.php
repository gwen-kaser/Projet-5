<?php $title = 'Gestion des destinations'; ?>

<?php ob_start(); ?>

    <div class="jumbotron jumbotron-fluid" style="background: url(public/images/home.jpg) no-repeat center center fixed; background-size: cover;">
        <div class="container py-5 text-center">
            <img class="img-fluid mb-5" src="public/images/logo.png" alt>
        </div>
    </div>

    <div class="container text-center py-5">
        <div class="jumbotron bg-light border border-primary border border-top-0 border border-end-0"> 
            <h3 class="font-weight-light font-italic">GESTION DES DESTINATIONS</h3>
        </div>
    </div>

    <!--Affichage des destinations-->
    <?php
    while ($data = $destinations->fetch())
    {
    ?>
        <div class="container py-5">
            <div class="row mb-5 d-block mx-auto">
                <div class="col text-center">
                    <img class="img-fluid w-50" src="uploads/<?= ($data['image_slider']) ?>" alt>
                </div>
            </div>
            <div class="col">
                <div class="text-block">
                    <h4 class="font-weight-light"><?= htmlspecialchars($data['title']) ?></h4>
                    <p><?= htmlspecialchars($data['content']) ?></p>
                    <i class="fa-regular fa-star"></i>
                    <?= ($data['numberFavorite']) ?>
                </div>
                
                <!-- Bouton suppression et modification destination -->
                <div class="pt-2">
                    <a href= ""class="font-italic">Modifier</a> |
                    <a href= "index.php?action=deleteDestination&amp;id=<?= $data['id']?>" class="font-italic">Supprimer</a>
                </div>
            </div>
        </div>
    
    <?php
    }
    $destinations->closeCursor();
    ?> 

    <div class="text-center py-5">
        <a href="index.php?action=addDestinationView" class="btn btn-sm border border-primary active" role="button" aria-pressed="true">Ajouter une destination</a>
    </div>


<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>