<?php $title = 'Nouvelle destination'; ?>

<?php ob_start(); ?>

    <!-- Inscription -->
    <div class="container">
        <div class="row mt-5 justify-content-center text-primary">
            <div class="col-12 col-md-6 col-lg-4 py-5">
                <h3 class="pb-5">NOUVELLE DESTINATION</h3>
                
                <form action="index.php?action=addDestination" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="text" id="title" name="title" required="">
                        <label for="title">TITRE</label><br/>
                    </div>
                    <div class="form-group">
                        <input type="text" id="content" name="content" required="">
                        <label for="content">TEXTE</label><br/>
                    </div>
                    <div class="form-group">
                        <label for="image_home">IMAGE D'ACCUEIL</label><br/>
                        <input type="file" class="form-control" id="image_home" name="image_home">
                    </div>
                    <div class="form-group">
                        <label for="image_slider">IMAGE DIAPORAMA</label><br/>
                        <div class="flex-input">
                            <input type="file" id="image_slider" name="image_slider">
                            <i class="fal fa-plus-circle"id="add-file"></i>
                        </div>
                        <div id="file"></div>
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

<script src="public/js/images.js"></script>
<script>let images = new Images()</script>



