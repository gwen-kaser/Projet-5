<?php $title = 'Modifier une destination'; ?>

<?php ob_start(); ?>

    <!-- Modification d'une destination -->
    <div class="container">
        <div class="row mt-5 justify-content-center text-primary">
            <div class="col-12 col-md-6 py-5">
                <h3 class="pb-5">MODIFIER UNE DESTINATION</h3>
                
                <form action="index.php?action=editDestination&amp;id=<?= $destination['id']?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="text" id="title" name="title" required="" value="<?= $destination['title'] ?>">
                        <label for="title">TITRE</label><br/>
                    </div>
                    <div class="form-group">
                        <label for="content">DESCRIPTION</label><br/>
                        <textarea id="content" name="content"><?= $destination['content'] ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="address">ADRESSE</label><br/>
                        <textarea id="address" name="address"><?= $destination['address'] ?></textarea>
                    </div>
                    <div class="form-group">
                        <input type="text" id="price" name="price" required="" value="<?= $destination['price'] ?>">
                        <label for="price">TARIF</label><br/>
                    </div>
                    <div class="form-group">
                        <input type="text" id="link" name="link" required="" value="<?= $destination['link'] ?>">
                        <label for="link">LIEN DU SITE DE L'HÔTEL</label><br/>
                    </div>
                    <div class="form-group">
                        <label for="image_home">IMAGE D'ACCUEIL</label><br/>
                        <div id="img-home">
                            <img class="img-responsive w-25 py-2" src="uploads/<?= ($destination['image_slider']) ?>" alt="Hôtel insolite">
                            <!-- icon pour supprimer l'image d'acceuil -->
                            <i class="fa-solid fa-xmark mr-3" id="delete-img-home"></i>
                        </div>
                        <input type="file" id="image_home" name="image_home">
                    </div>
                    <div class="form-group">
                        <label for="image_slider">IMAGE DIAPORAMA</label><br/>
                        <!-- Boucle pour afficher les images-->
                        <?php foreach ($images as $image): ?>
                        <!-- Attribut data pour supprimer chaque image + icon -->
                        <div data-numero-image="<?= $image['id']?>">
                            <img class="img-slider img-responsive w-25 py-2" src="uploads/<?= ($image['image_slider']) ?>" alt="Hôtel insolite">
                            <!-- icon pour supprimer les images du slider -->
                            <i data-numero-image="<?= $image['id']?>" class="delete-img-slider fa-solid fa-xmark mr-3"></i>
                        </div> 
                        <?php endforeach; ?>
                        <!-- champ pour suppression des images côté serveur -->
                        <input type="hidden" id="delete-img" name="delete-img">   
                        <div class="flex-input">
                            <input type="file" id="image_slider" name="image_slider[]">
                            <!-- icon pour ajouter les images du slider -->
                            <i class="fa-solid fa-plus-minus" id="add-file"></i>
                        </div>
                        <div id="file"></div>
                    </div>   
                    <div class="form-group">
                        <input type="text" id="latitude" name="latitude" required="" value="<?= $destination['latitude'] ?>">
                        <label for="latitude">LATITUDE</label><br/>
                    </div>   
                    <div class="form-group">
                        <input type="text" id="longitude" name="longitude" required="" value="<?= $destination['longitude'] ?>">
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