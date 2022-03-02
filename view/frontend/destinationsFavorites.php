<?php $title = 'Destinations Favorites'; ?>

<?php ob_start(); ?>

    <div class="jumbotron jumbotron-fluid" style="background: url(public/images/home.jpg) no-repeat center center fixed; background-size: cover;">
        <div class="container py-5 text-center">
            <img class="img-fluid mb-5" src="public/images/logo.png" alt>
        </div>
    </div>

    <!--Affichage des destinations-->
    <?php
    while ($data = $displayFavorites->fetch())
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
                    <p>TARIF : <?= htmlspecialchars($destination['price']) ?></p>
                    <p>LIEN DU SITE : <?= htmlspecialchars($destination['link']) ?></p>
                    <a href="index.php?action=destination&amp;id=<?= $data['id'] ?>"><i class="fa-solid fa-arrow-right-long fa-2x"></i></a>
                </div>
                    <a class="font-italic" href="index.php?action=deleteFavorite&amp;id=<?= $data['id']?>">Supprimer la destination favorite</a>   
            </div>
        </div>
    <?php
    }
    $displayFavorites->closeCursor();
    ?> 


<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>