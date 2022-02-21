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
            <div class="row mb-5">
                <div class="col-md-4 offset-md-2">
                    <img class="img-fluid" src="uploads/<?= ($data['image_slider']) ?>" alt>
                </div>
                <div class="col-md-5">
                    <div class="text-block">
                        <h4 class="font-weight-light"><?= htmlspecialchars($data['title']) ?></h4>
                        <p><?= htmlspecialchars($data['content']) ?></p>
                    </div>
                    <a class="font-italic" href="index.php?action=deleteFavorite&amp;id=<?= $data['id']?>">Supprimer la destination favorite</a>
                </div>
            </div>
        </div>
    <?php
    }
    $displayFavorites->closeCursor();
    ?> 


<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>