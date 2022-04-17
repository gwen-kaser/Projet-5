<?php $title = 'Nuits insolites / Accueil'; ?>

<?php ob_start(); ?>

    <!--Accueil-->
    <div class="img" style="background: url(public/images/home.jpg) no-repeat center center fixed; background-size: cover; height: 100vh;">
        <div class="logo text-center">
            <img class="img-fluid mb-5" src="public/images/logo.png" alt="logo">
        </div>  
    </div>  

    <div class="container py-5 my-5">
        <div class="jumbotron-fluid py-5 px-5 bg-light border border-primary border border-top-0 border border-end-0 shadow"> 
            <h2 class="font-weight-light font-italic">NUITS INSOLITES</h2>
            <p class="font-italic pt-2">
                Vous propose plusieurs destinations avec des hôtels atypiques qui vous feront rêver !<br>
                Des séjours INSOLITES que vous n'êtes pas prêts d'oublier !<br>
                Découvrez-les en vous connectant et rajoutez-les dans vos destinations favorites !     
            </p> 
        </div>
    </div>

    <!--Affichage des destinations-->
    <?php while ($data = $destinations->fetch()): ?>
        <div class="container py-5">
            <div class="row pb-5">
                <div class="col-md-5 offset-md-1">
                    <img class="img-fluid rounded" src="uploads/<?= ($data['image_slider']) ?>" alt="Hôtel insolite">
                </div>
                <div class="col-md-5 pt-1">
                    <div class="text-block">
                        <h4 class="font-weight-light"><?= htmlspecialchars($data['title']) ?></h4>
                        <?php 
                            if (strlen($data['content']) > 200) { 
                            $data['content'] = substr($data['content'], 0, 200).'...'; } 
                        ?>
                        <p><?= htmlspecialchars($data['content']) ?></p>
                        
                        <!-- Condition si le membre est connecté il peut accéder à la destination sinon redirection page connexion -->
                        <?php if (isset($_SESSION['id'])): ?>
                            <a href="index.php?action=destination&amp;id=<?= $data['id'] ?>"><i class="fa-solid fa-circle-chevron-right fa-2x"></i></a>
                        <?php else: ?> 
                            <a href="index.php?action=connexion"><i class="fa-solid fa-circle-chevron-right fa-2x"></i></a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    <?php endwhile;
    $destinations->closeCursor();
    ?>  

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>