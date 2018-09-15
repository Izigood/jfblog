<?php ob_start(); ?>

                            <div class="container-fluid">
                                <div class="container">
                                    <h1 style="text-transform: uppercase; font-family: Roboto; font-weight: 600; text-align: center; margin-top: 60px; margin-bottom: 50px;" class="">tableau de bord</h1>
                                </div>
                            </div>
                            <div class="container">
                                <div class="row">
                                    <div class="container">
                                        <h4 class="text-center mb-0">
                                        <div class="container">
                                            <div class="alert alert-primary"> Vous avez rédigez un total de <strong><?= $posts[0] ?></strong> chapitre(s) !            
                                            </div>
                                            <div class="alert alert-success"> Actuellement, vous avez <strong><?=$comments[0] ?></strong> commentaire(s) posté(s).</div>
                                            <div class="alert alert-danger"> Attention, <strong><?= $reportingComments[0] ?></strong> commentaire(s) a / ont été signalé(s) !!!            
                                            </div>
                                        </div>  
                                    </div>
                                        <div class="col-lg-12 ">
                                            <div class="container">
                                                <div class="row mt-5 d-flex justify-content-center ">
                                                    <h4 class="text-center mb-5">Liste des 5 derniers chapitres</h4>
                                                <div class="col-lg-12 mb-5" style="color: #000000;">
                                                    <div class="table-responsive-lg">
                                                        <table class="table"> 
                                                            <thead> 
                                                                <tr> 
                                                                    <th class="text-center">N° Chapitre</th> 
                                                                    <th class="text-center">Image</th> 
                                                                    <th class="text-center">Titre</th> 
                                                                    <th class="text-center">Résumé</th> 
                                                                    <th class="text-center">Date de création</th> 
                                                                </tr>                                             
                                                            </thead>                                         
                                                            <tbody> 

<?php
while ($data = $fivePosts->fetch(PDO::FETCH_ASSOC))
{
?>

                                                                <tr> 
                                                                    <th scope="row" class="text-center"><?= $data['id'] ?></th> 
                                                                    <td>
                                                                         <img src="assets/images/<?= $data['picture'] ?>" alt="" width="100px" height="50px" class="text-center"/>
                                                                    </td>                                                 
                                                                    <td class="text-center"><?= htmlspecialchars($data['title']) ?></td> 
                                                                    <td class="text-justify"><?php $content = strip_tags(substr($data['content'],0,500)); echo nl2br(htmlspecialchars($content)). "..."; ?></td>
                                                                    <td class="text-center"><?= $data['creation_date_fr'] ?></td> 
                                                                </tr>  
                                            
                                            <?php
}
$fivePosts->closeCursor();
?>                                            

                                                            </tbody>                                         
                                                        </table>
                                                    </div>
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-lg-12 mt-3 mb-3">
                                        <div class="container">
                                            <div class="row mb-5 d-flex justify-content-center ">
                                                <h4 class="text-center mb-5">Liste des 5 derniers commentaires</h4>
                                                <div class="col-lg-12 mb-5" style="color: #000000;">
                                                    <div class="table-responsive-lg">
                                                        <table class="table"> 
                                                            <thead> 
                                                                <tr> 
                                                                    <th class="text-center">N° Commentaire</th> 
                                                                    <th class="text-center">Pseudo</th> 
                                                                    <th class="text-center">Commentaire</th> 
                                                                    <th class="text-center">Date de création</th> 
                                                                    <th class="text-center">Signalement</th> 
                                                                </tr>                                             
                                                            </thead>                                         
                                                            <tbody>
                                            
                                        <?php
while ($data = $fiveComments->fetch(PDO::FETCH_ASSOC))
{
?>                                        

                                                                <tr> 
                                                                    <th scope="row" class="text-center"><?= $data['id'] ?></th> 
                                                                    <td class="text-center"><?= htmlspecialchars($data['pseudo']) ?>
                                                                    </td>                                                 
                                                                    <td class="text-justify"><?= htmlspecialchars($data['comment']) ?></td> 
                                                                    <td class="text-center"><?= $data['comment_date_fr'] ?></td>
                                                                    <td class="text-center"><?= htmlspecialchars($data['reporting']) ?></td> 
                                                                </tr> 
                                            
                                            <?php
}
$fiveComments->closeCursor();
?>                                      

                                                            </tbody>                                         
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
   
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>