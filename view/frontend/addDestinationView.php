<?php $title = 'Nouvelle destination'; ?>

<?php ob_start(); ?>

    <!-- Inscription -->
    <div class="container">
        <div class="row mt-5 justify-content-center text-primary">
            <div class="col-12 col-md-6 col-lg-4 py-5">
                <h3 class="pb-4">NOUVELLE DESTINATION</h3>
                
                <form action="index.php?action=addDestination" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="title">TITRE</label><br/>
                        <input type="text" id="title" name="title" required="">
                    </div>
                    <div class="form-group">
                        <label for="content">TEXTE</label><br/>
                        <input type="text" id="content" name="content" required="">
                    </div>
                    <div class="form-group">
                        <label for="image_home">IMAGE PAGE D'ACCUEIL</label><br/>
                        <input type="file" class="form-control" id="image_home" name="image_home" required="">
                    </div>
                    <div class="form-group">
                        <label for="image">IMAGE</label><br/>
                        <input type="file" class="form-control" id="image" name="image" required="">
                    </div>
                    <div class="form-group">
                        <label for="latitude">LATITUDE</label><br/>
                        <input type="text" id="latitude" name="latitude" required="">
                    </div>
                    <div class="form-group">
                        <label for="longitude">LONGITUDE</label><br/>
                        <input type="text" id="longitude" name="longitude" required="">
                    </div>
                    <button type="submit" class="btn-primary btn-sm">CONFIRMER</button>
                </form>
            </div>
        </div>
    </div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>