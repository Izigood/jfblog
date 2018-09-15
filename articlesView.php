<?php setcookie('page', $page, time() + 365*24*3600, null, null, false, true); ?>

<?php ob_start(); ?>

                            <div class="container-fluid">
                                <div class="container">
                                    <h1 style="text-transform: uppercase; font-family: Roboto; font-size: 2em; font-weight: 600; text-align: center; margin-top: 60px; margin-bottom: 50px;" class="">tous les chapitres</h1>
                                </div>
                            </div>
                            <div class="container">
                                <div class="row">
                                    <div class="container mb-3">
                                        <a href="index.php?action=dashboard" style="color: #5aa2db; text-decoration: none; font-family: Roboto;">&nbsp;&lt;&lt; Retour vers le tableau de bord&nbsp;</a>
                                    </div>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg-12 d-flex justify-content-center mt-5">
                                            <a href="index.php?action=newPost" class="btn btn-success btn-md" role="button" aria-pressed="true" style=" Roboto; font-size: 1.2em; text-transform: uppercase; letter-spacing: 0.1em;"><i class="fa fa-plus fa-lg"></i> Ajouter un chapitre</a>                            
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 mt-3 mb-3">
                                        <div class="container">
                                            <div class="row mt-5 d-flex justify-content-center mb-5">
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
                                                                    <th class="text-center">Actions</th>
                                                                    <th class="text-center"></th>
                                                                </tr>                                             
                                                                </thead>                                         
                                                                <tbody> 

<?php
while ($data = $posts->fetch(PDO::FETCH_ASSOC))
{
?>

                                                                    <tr> 
                                                                        <th scope="row" class="text-center"><?= $data['id'] ?></th> 
                                                                        <td>
                                                                            <img src="assets/images/<?= $data['picture'] ?>" alt="" width="100px" height="50px" class="text-center"/>
                                                                        </td>                                                 
                                                                        <td class="text-center"><?= htmlspecialchars($data['title']) ?></td> 
                                                                        <td class="text-justify"><?php $content = strip_tags(substr($data['content'],0,100)); echo nl2br(htmlspecialchars($content)). "..."; ?></td>
                                                                        <td class="text-center"><?= htmlspecialchars($data['creation_date_fr']) ?></td>
                                                                        <td class="text-center">
                                                                            <a href="index.php?action=readPost&amp;id=<?= $data['id'] ?>" class="btn btn-primary btn-md" role="button" aria-pressed="true">Modifier</a>
                                                                        </td>
                                                                        <td class="text-center">
                                                                            <a href="index.php?action=deletePost&amp;id=<?= $data['id'] ?>" class="btn btn-danger btn-md" role="button" aria-pressed="true">Supprimer</a>
                                                                        </td>                                                 
                                                                    </tr>  
 
<?php  
}
$posts->closeCursor();
?>
                                            
                                                                </tbody>                                         
                                                            </table>
                                                    </div>
                                                </div>
                                                <div class="container mt-4">
                                                    <ul class="pagination d-flex justify-content-center">
                                    
                                <?php
while($customPagination < $pagination)
{
?>                                

                                                        <li class="page-item">
                                                            <a class="page-link" href="index.php?action=chapters&amp;page=<?php echo ($customPagination+1); ?>"><?php echo ($customPagination+1); ?></a>
                                                        </li>                                     
                                    
<?php
$customPagination++;
}
?>

                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>        