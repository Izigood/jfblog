<?php ob_start(); ?>

                            <div class="container-fluid">
                                <div class="container">
                                    <h1 style="text-transform: uppercase; font-family: Roboto; font-size: 2em; font-weight: 600; text-align: center; margin-top: 60px; margin-bottom: 50px;" class="">Modifier le chapitre</h1>
                                </div>
                            </div>
                            <div class="container">
                                <div class="row">
                                    <div class="container mb-3">
                                        <a href="index.php?action=chapters&amp;page=<?= $_COOKIE['page'] ?>" style="color: #5aa2db; text-decoration: none; font-family: Roboto;">&nbsp;&lt;&lt; Retour vers la page précédente&nbsp;</a>
                                    </div>
                                     <div class="col-lg-12 mt-5 mb-3">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-lg-12 d-flex justify-content-center mt-4">                      
                                                    <img src="assets/images/<?php echo $post['picture']; ?>" style="box-shadow: 0px 10px 20px; display: flex;" class="mb-5" width="70%" height="70%">
                                                </div>
                                                <div class="col-lg-12" style="color: #000000;">             
                                                <form action="index.php?action=updatePost&amp;id=<?php echo $post['id']; ?>" method="post" enctype="multipart/form-data">
                                                        <div class="form-group mt-3"> 
                                                            <label for="title" style="font-family: Lato; font-size: 1.1em;">Titre du chapitre</label>                                         
                                                            <input type="text" class="form-control mb-4" name="title" id="title" value="<?php echo $post['title']; ?>" required> 
                                                        </div>                                     
                                                        <div class="form-group mt-5"> 
                                                            <div class="form-group"> 
                                                                <label for="content" style="font-family: Lato; font-size: 1.1em;">Texte du chapitre</label>                                             
                                                                <textarea class="form-control" rows="3" name="content" id="content" required><?php echo $post['content']; ?></textarea>                                             
                                                            </div>                                         
                                                        </div>                                     
                                                        <div class="form-group mt-5"> 
                                                            <label for="picture" style="font-family: Lato; font-size: 1.1em;" class="mr-2 mb-4">Modifier l'image</label>                                         
                                                            <input type="file" name="picture" id="picture"> 
                                                        </div>                                                                         
                                                            <button type="submit" class="btn btn-light" style="width: 100%; font-family: Roboto; text-transform: uppercase;">Modifier le chapitre</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>  
        
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>