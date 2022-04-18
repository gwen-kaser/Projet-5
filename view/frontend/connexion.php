<?php $title = 'Connexion'; ?>

<?php ob_start(); ?>

    <!-- Connexion --> 
    <div class="container py-5 my-5 border border-primary border border-top-0 border border-end-0 shadow">
        <div class="row my-3 justify-content-center text-primary">
            <div class="col-12 col-md-6 col-lg-4 py-5">
                <h3 class="pb-4 font-weight-light">CONNEXION</h3>
                        
                <form action="index.php?action=connexionUser" method="post">
                    <div class="form-group">
                        <input type="text" id="pseudo" name="pseudo" required="">
                        <label for="pseudo">PSEUDO</label><br/>
                        <!-- Affiche erreur côté serveur -->
                        <div class="font-italic"><?php echo $errorPseudo ?? "";?></div>
                    </div>
                    <div class="form-group">
                        <input type="password" id="pass" name="pass" required="">
                        <label for="pass">MOT DE PASSE</label><br/>
                        <!-- Affiche erreur côté serveur -->
                        <div class="font-italic"><?php echo $errorPassword ?? "";?></div>
                    </div>
                    <button type="submit" class="border border-primary btn-sm">CONNEXION</button><br/><br/>
                    <a class="font-italic" href="index.php?action=registration">VOUS SOUHAITEZ VOUS INSCRIRE ?</a>
                </form>
            </div>
        </div>  
    </div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>