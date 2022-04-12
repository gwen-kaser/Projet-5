<?php $title = 'Nouvelle destination'; ?>

<?php ob_start(); ?>

    <!-- L'ajout d'une destination -->
    <div class="container">
        <div class="row mt-5 justify-content-center text-primary">
            <div class="col-12 col-md-6 py-5">
                <h3 class="pb-5">NOUVELLE DESTINATION</h3>
                
                <form action="index.php?action=addDestination" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="text" id="title" name="title" required="">
                        <label for="title">TITRE</label><br/>
                    </div>
                    <div class="form-group">
                        <label for="content">TEXTE</label><br/>
                        <textarea type="text" id="content" name="content"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="address">ADRESSE</label><br/>
                        <textarea type="text" id="address" name="address"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="text" id="price" name="price" required="">
                        <label for="price">TARIF</label><br/>
                    </div>
                    <div class="form-group">
                        <input type="text" id="link" name="link" required="">
                        <label for="link">LIEN DU SITE DE L'HÔTEL</label><br/>
                    </div>
                    <div class="form-group">
                        <label for="image_home">IMAGE D'ACCUEIL</label><br/>
                        <input type="file" class="form-control" id="image_home" name="image_home">
                    </div>
                    <div class="form-group">
                        <label for="image_slider">IMAGE DIAPORAMA</label><br/>
                        <div class="flex-input">
                            <input type="file" id="image_slider" name="image_slider[]">
                            <i class="fa-solid fa-plus-minus" id="add-file"></i>
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
                    <button type="submit" class="border border-primary btn-sm">CONFIRMER</button>
                </form>
            </div>
        </div>
    </div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>

<script src="public/js/images.js"></script>
<script>let images = new Images()</script>



