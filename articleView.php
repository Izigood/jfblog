<?php ob_start(); ?>
                            <div class="container-fluid">
                                <div class="container">
                                    <h1 style="text-transform: uppercase; font-size: 2em; font-family: Roboto; font-weight: 600; text-align: center; margin-top: 60px; margin-bottom: 50px;" class="">Créer le nouveau chapitre</h1>
                                </div>
                            </div>
                            <div class="container">
                                <div class="row">
                                    <div class="container mb-3">
                                        <a href="index.php?action=chapters&amp;page=<?= $_COOKIE['page'] ?>" style="color: #5aa2db; text-decoration: none; font-family: Roboto;">&nbsp;&lt;&lt; Retour vers la page précédente&nbsp;</a>
                                    </div>
                                    <div class="col-lg-12 mt-5 mb-3">
                                        <form action="index.php?action=createPost" method="post" enctype="multipart/form-data">
                                            <div class="form-group"> 
                                                <label for="title" style="font-family: Lato; font-size: 1.1em;">Titre du chapitre</label>                                         
                                                <input type="text" class="form-control mb-4" name="title" id="title"required> 
                                            </div>                                     
                                            <div class="form-group mt-5"> 
                                                <div class="form-group"> 
                                                    <label for="content" style="font-family: Lato; font-size: 1.1em;">Texte du chapitre</label>                                             
                                                    <textarea class="form-control" rows="3" name="content" id="content"></textarea>                                             
                                                </div>                                         
                                            </div>                                     
                                            
                                            <div class="form-group mt-5">
                                                <label for="picture" style="font-family: Lato; font-size: 1.2em;" class="mt-3mb-4">Télécharger une image</label>                                         
                                                <input type="file" name="picture" id="picture" style="font-size: 0.9em;"> 
                                            </div>                                                                             
                                                <button type="submit" class="btn btn-light mt-3" style="width: 100%; font-family: Roboto; text-transform: uppercase;">Nouveau chapitre</button>                                
                                        </form>

                            
                                    </div>
                                </div>
                            </div>          
        
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
