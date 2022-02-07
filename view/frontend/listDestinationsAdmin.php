<?php $title = 'Gestion des destinations'; ?>

<?php ob_start(); ?>

    <div class="jumbotron jumbotron-fluid" style="background: url(public/images/home.jpg) no-repeat center center fixed; background-size: cover;">
        <div class="container py-5 text-center">
            <img class="img-fluid mb-5" src="public/images/logo.png" alt>
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
                    </div>
                    <!-- Bouton suppression et modification destination -->
                    <div class="font-italic pt-2">
                        <a href= "">Modifier</a> |
                        <a href= "index.php?action=deleteDestination&amp;id=<?= $data['id']?>">Supprimer</a>
                    </div>
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