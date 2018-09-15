<?php ob_start(); ?>

                            <div class="container-fluid">
                                <div class="container">
                                    <h1 style="text-transform: uppercase; font-family: Roboto; font-weight: 600; text-align: center; margin-top: 60px; margin-bottom: 50px;" class="">Espace de connexion</h1>
                                </div>
                            </div>
                            <div class="container">
                                <div class="row">
                                    <div class="container mb-3">
                                        <a href="index.php" style="color: #5aa2db; text-decoration: none; font-family: Roboto;">&nbsp;&lt;&lt; Retour vers la liste de tous les chapitres&nbsp;</a>
                                    </div>
                                    <div class="col-lg-12 mt-3 mb-3">
                                        <div class="container">
                                            <div class="row d-flex justify-content-around mb-5">
                                                <div class="col-lg-4 mb-5" style="color: #000000;">
                                                    <h4 class="mt-5 pb-0 mb-0 text-center" style="font-family: Roboto; text-transform: capitalize; color: #5aa2db; font-size: 2em; text-decoration: underline;">identification</h4>
                                                    <h4 class="mb-2 mt-5 d-flex justify-content-center" style="font-family: Roboto; text-transform: uppercase;"></h4>
                                                    <form action="index.php?action=login" method="post">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" name="login" id="login" placeholder="Votre login..." required>
                                                            <input type="password" class="form-control mt-3" name="password" id="password" placeholder="Votre mot de passe..." required>
                                                            <button type="submit" class="btn btn-light mt-3" style="width: 100%; font-family: Roboto; font-size: 1.2em; text-transform: uppercase; letter-spacing: 0.2em;">Connexion</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
      
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>