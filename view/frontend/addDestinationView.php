<?php $title = 'Nouvelle destination'; ?>

<?php ob_start(); ?>

    <!-- Inscription -->
    <div class="container">
        <div class="row mt-5 justify-content-center text-primary">
            <div class="col-12 col-md-6 col-lg-4 py-5">
                <h3 class="pb-4">NOUVELLE DESTINATION</h3>
                
                <form action="index.php?action=addDestination" method="post">
                    <div class="form-group">
                        <input type="text" id="title" name="title" required="">
                        <label for="title">TITRE</label><br/>
                    </div>
                    <div class="form-group">
                        <input type="text" id="content" name="content" required="">
                        <label for="content">TEXTE</label><br/>
                    </div>
                    <div class="form-group">
                        <input type="text" id="image_home" name="image_home" required="">
                        <label for="image_home">IMAGE PAGE D'ACCUEIL</label><br/>
                    </div>
                    <div class="form-group">
                        <input type="text" id="image" name="image" required="">
                        <label for="image">IMAGE</label><br/>
                    </div>
                    <div class="form-group">
                        <input type="text" id="latitude" name="latitude" required="">
                        <label for="latitude">LATITUDE</label><br/>
                    </div>
                    <div class="form-group">
                        <input type="text" id="longitude" name="longitude" required="">
                        <label for="longitude">LONGITUDE</label><br/>
                    </div>
                    <button type="submit" class="btn-primary btn-sm">CONFIRMER</button>
                </form>
            </div>
        </div>
    </div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>