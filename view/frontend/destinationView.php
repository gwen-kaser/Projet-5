<?php $title = 'Destination'; ?>

<?php ob_start(); ?>

    <!-- Diaporama -->
    <div class="container">
        <div class="row">
            <div class="col">
                <div id="carouselControls" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner text-center">
                        <div class="carousel-item active">
                            <img src="public/images/afrique-safari-palace-1.jpg" class="d-block w-50 mx-auto" alt="">
                        </div>
                        <div class="carousel-item">
                            <img src="public/images/canada-wood-palace-1.jpg" class="d-block w-50 mx-auto" alt="">
                        </div>
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

    <!-- Description -->
    <div class="container mt-5">
        <div class="col">
            <div class="text-center">
                <h4>BORABORA, PILOTIS PALACE</h4>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Omnis laudantium at debitis veniam recusandae ipsam saepe fugit qui!</p>
            </div>
        </div>
    </div>
    



    <!-- Map -->







<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>