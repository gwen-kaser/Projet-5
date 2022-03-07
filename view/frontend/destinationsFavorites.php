<?php $title = 'Destinations Favorites'; ?>

<?php ob_start(); ?>

    <div class="img mb-5" style="background: url(public/images/home.jpg) no-repeat center center fixed; background-size: cover; height: 100vh;" alt="Paysage insolite;">
        <div class="logo text-center">
            <img class="img-fluid" src="public/images/logo.png" alt="logo">
        </div>
    </div> 

    <!--Affichage des destinations favorites-->
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
                    <a href="index.php?action=destination&amp;id=<?= $data['id'] ?>"><i class="fa-solid fa-arrow-right-long fa-2x"></i></a>
                </div>  
            </div>
        </div>
    <?php
    }
    $displayFavorites->closeCursor();
    ?> 


<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>