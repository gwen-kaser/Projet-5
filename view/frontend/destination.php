<?php $title = 'Destination'; ?>

<?php ob_start(); ?>

    <!-- Diaporama -->
    <div class="container mt-5">
        <div class="row bg-light border border-0">
            <div class="col">
                <div id="carouselControls" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner text-center">
                        <?php foreach ($images as $index => $image):?>
                            <div class="carousel-item <?= $index == 0 ? "active" : ""?>">
                                <img class="img-responsive" src="uploads/<?= ($image['image_slider']) ?>" alt=""> 
                            </div>
                        <?php endforeach;?>
                    </div>
                    <a class="carousel-control-prev" href="#carouselControls" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselControls" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Description destination -->
    <div class="container my-5">
        <div class="col">
            <div class="text-block">
                <h4 class="font-weight-light"><?= htmlspecialchars($destination['title']) ?></h4>
                <p><?= htmlspecialchars($destination['content']) ?></p>
                <p>TARIF : <?= htmlspecialchars($destination['price']) ?></p>
                <p>LIEN DU SITE : <?= htmlspecialchars($destination['link']) ?></p>
                
                <!-- Condition destination favorite / la couleur de l'incon change -->
                <?php if ($destination['user_id']) { ?> 
                    <a href="index.php?action=addFavorite&amp;id=<?=$destination['id']?>"><i class="fa-solid fa-star fa-2x"></i></a>
                <?php } else { ?> 
                    <a href="index.php?action=addFavorite&amp;id=<?=$destination['id']?>"><i class="fa-regular fa-star fa-2x"></i></a>
                <?php } ?> 
            </div>
        </div>
    </div>
    
    <!-- Map -->
    <div id="map"></div>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"/>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    
    <script type="text/javascript"> 
    var map = L.map('map').setView([<?= ($destination['latitude'].','. $destination['longitude']); ?>],8);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '© <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);
    </script>


<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>