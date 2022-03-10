<?php $title = 'Gestion des destinations'; ?>

<?php ob_start(); ?>

    <div class="img" style="background: url(public/images/home.jpg) no-repeat center center fixed; background-size: cover; height: 100vh;" alt="Paysage insolite;">
        <div class="logo text-center">
            <img class="img-fluid" src="public/images/logo.png" alt="logo">
        </div>
    </div> 

    <div class="container py-5 my-5">
        <div class="jumbotron-fluid py-5 px-5 bg-light border border-primary border border-top-0 border border-end-0 shadow"> 
            <h2 class="font-weight-light font-italic">GESTION DES DESTINATIONS</h2>
            <p class="font-italic pt-2">
                Ajouter / Modifier / Supprimer une destination
            </p> 
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
                    <img class="img-fluid w-50" src="uploads/<?= ($data['image_slider']) ?>" alt="Hôtel insolite">
                </div>
            </div>
            <div class="col">
                <div class="text-block">
                    <h4 class="font-weight-light"><?= htmlspecialchars($data['title']) ?></h4>
                    <p><?= htmlspecialchars($data['content']) ?></p>
                    <p>Tarif : <?= htmlspecialchars($data['price']) ?></p>
                    <p>Lien du site : <?= htmlspecialchars($data['link']) ?></p>
                    <i class="fa-regular fa-star"></i>
                    <?= ($data['numberFavorite']) ?>
                </div>
                
                <!-- Bouton suppression et modification destination -->
                <div class="pt-2">
                    <a href= "index.php?action=displayEditDestination&amp;id=<?= $data['id']?>" class="font-italic">MODIFIER</a> |
                    <a href= "index.php?action=deleteDestination&amp;id=<?= $data['id']?>" class="font-italic">SUPPRIMER</a>
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