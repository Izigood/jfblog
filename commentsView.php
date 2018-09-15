<?php ob_start(); ?>

<?php
$message = "Auncun commentaire n'a été signalé !";
?>

                            <div class="container">
                                    <h1 style="text-transform: uppercase; font-size: 2em; font-family: Roboto; font-weight: 600; text-align: center; margin-top: 60px; margin-bottom: 50px;">Commentaires signalés</h1>
                            </div>
                            <div class="container">
                                <div class="row">
                                    <div class="container mb-5">
                                        <a href="index.php?action=dashboard" style="color: #5aa2db; text-decoration: none; font-family: Roboto;">&nbsp;&lt;&lt; Retour vers la page précédente&nbsp;</a>
                                    </div>
                                </div>
                                <div class="row mb-5 mt-5 d-flex justify-content-center ">
                                    <div class="col-lg-12" style="color: #000000;">
                                        <div class="table-responsive-lg">
                                             <table class="table"> 
                                                <thead> 
                                                    <tr> 
                                                        <th class="text-center">N° Commentaire</th> 
                                                        <th class="text-center">Pseudo</th> 
                                                        <th class="text-center">Commentaire</th> 
                                                        <th class="text-center">Date de création</th> 
                                                        <th class="text-center">Signalement</th> 
                                                        <th class="text-center">Actions</th>
                                                        <th class="text-center"></th> 
                                                    </tr>                                 
                                                </thead>                             
                                                <tbody>
                                
<?php
while ($data = $comments->fetch(PDO::FETCH_ASSOC))
{
?>                            

                                                    <tr> 
                                                        <th scope="row" class="text-center"><?= $data['id'] ?></th> 
                                                        <td class="text-center"><?= htmlspecialchars($data['pseudo']) ?></td>                                     
                                                        <td class="text-center"><?= htmlspecialchars($data['comment']) ?></td> 
                                                        <td class="text-center"><?= $data['comment_date_fr'] ?></td>
                                                        <td class="text-center"><?= htmlspecialchars($data['reporting']) ?></td>
                                                        <td class="text-center">
                                                            <a href="index.php?action=unlockingComment&amp;id=<?= $data['id'] ?>" class="btn btn-success btn-md" role="button" aria-pressed="true">Débloquer</a>
                                                        </td>
                                                        <td class="text-center">
                                                            <a href="index.php?action=deleteComment&amp;id=<?= $data['id'] ?>" class="btn btn-danger btn-md" role="button" aria-pressed="true">Supprimer</a>
                                                        </td>                                     
                                                    </tr>                                 

<?php  
$message = " ";
}
$comments->closeCursor();
?>

                                                </tbody>                             
                                            </table>
                                        </div>

<?php
echo '<p class="text-center" style="font-family: Roboto; color: green;">'.$message.'</p>';
?>

                                    </div>
                                </div>
                             </div>
       

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>