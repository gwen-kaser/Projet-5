<?php $title = 'Inscription'; ?>

<?php ob_start(); ?>

    
    <!-- Inscription -->
    <div class="container py-5 my-5 border border-primary border border-top-0 border border-end-0 shadow">
        <div class="row justify-content-center text-primary">
            <div class="col-12 col-md-6 col-lg-4 py-5">
                <h3 class="pb-4 font-weight-light">INSCRIPTION</h3>
                    
                <form action="index.php?action=saveUser" method="post" id="form">
                    <div class="form-group">
                        <input type="text" id="pseudo" name="pseudo" required="">
                        <label for="pseudo">PSEUDO</label><br>
                    </div>
                    <div class="form-group">
                        <input type="password" id="pass" name="pass" required="">
                        <label for="pass">MOT DE PASSE</label><br>
                        <!-- Affiche erreur côté serveur -->
                        <div class="font-italic"><?php echo $errorPassword ?? "";?></div>
                    </div>
                    <div class="form-group">
                        <input type="password" id="pass2" name="pass2" required="">
                        <label for="pass2">CONFIRMATION DU MOT DE PASSE</label><br>
                        <!-- Affiche erreur côté client -->
                        <span class="font-italic text-primary" id="missing_pass2"></span>
                    </div>
                    <div class="form-group">
                        <input type="text" id="email" name="email" required="">
                        <label for="email">EMAIL</label><br>
                        <!-- Affiche erreur côté client -->
                        <span class="font-italic text-primary" id="missing_email"></span>
                        <!-- Affiche erreur côté serveur -->
                        <div class="font-italic"><?php echo $errorEmail ?? "";?></div>
                    </div>
                    <button type="submit" class="border border-primary btn-sm" id="button_confirm" >CONFIRMER</button>
                </form>
            </div>
        </div>
    </div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>

<script src="public/js/validationForm.js"></script>
<script>let validationForm = new ValidationForm()</script>