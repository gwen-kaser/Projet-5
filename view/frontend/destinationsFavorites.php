<?php $title = 'Destinations Favorites'; ?>

<?php ob_start(); ?>

    <div class="img" style="background: url(public/images/home.jpg) no-repeat center center fixed; background-size: cover; height: 100vh;">
        <div class="logo text-center">
            <img class="img-fluid mb-5" src="public/images/logo.png" alt="logo">
        </div>  
    </div>  

    <div class="container py-5 my-5">
        <div class="jumbotron-fluid py-5 px-5 bg-light border border-primary border border-top-0 border border-end-0 shadow"> 
            <h2 class="font-weight-light font-italic">VOS DESTINATIONS FAVORITES</h2>
        </div>
    </div>

    <!--Affichage des destinations favorites-->
    <?php while ($data = $displayFavorites->fetch()): ?>
        <div class="container py-5">
            <div class="row mb-5 d-block mx-auto">
                <div class="col text-center">
                    <img class="img-fluid w-50 rounded" src="uploads/<?= ($data['image_slider']) ?>" alt="Hôtel insolite">
                </div>
            </div>
            <div class="col">
                <div class="text-block">
                    <h4 class="font-weight-light"><?= htmlspecialchars($data['title']) ?></h4>
                    <a href="index.php?action=destination&amp;id=<?= $data['id'] ?>"><i class="fa-solid fa-circle-chevron-right fa-2x"></i></a>
                </div>  
            </div>
        </div>
    <?php
    endwhile;
    $displayFavorites->closeCursor();
    ?> 


<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>