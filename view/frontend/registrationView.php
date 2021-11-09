<?php $title = 'Inscription'; ?>

<?php ob_start(); ?>

    
    <!-- Inscription -->
    <div class="container">
        <div class="row mt-5 justify-content-center text-primary">
            <div class="col-12 col-md-6 col-lg-4 py-5">
                <h3 class="pb-4 font-weight-light">INSCRIPTION</h3>
                
                <form action="index.php?action=saveUser" method="post">
                    <div class="form-group">
                        <input type="text" id="pseudo" name="pseudo" required="">
                        <label for="pseudo">NOM UTILISATEUR</label><br/>
                    </div>
                    <div class="form-group">
                        <input type="password" id="pass" name="pass" required="">
                        <label for="pass">MOT DE PASSE</label><br/>
                        <div class="font-italic"><?php echo $errorPassword ?? "";?></div>
                    </div>
                    <div class="form-group">
                        <input type="password" id="pass2" name="pass2" required="">
                        <label for="pass2">CONFIRMATION DU MOT DE PASSE</label><br/>
                    </div>
                    <div class="form-group">
                        <input type="text" id="email" name="email" required="">
                        <label for="email">EMAIL</label><br/>
                        <div class="font-italic"><?php echo $errorEmail ?? "";?></div>
                    </div>
                    <button type="submit" class="btn-sm border border-primary">CONFIRMER</button>
                </form>
            </div>
        </div>
    </div>


<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>