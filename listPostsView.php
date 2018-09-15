<?php setcookie('page', $page, time() + 365*24*3600, null, null, false, true); ?>

<?php ob_start(); ?>

                            <div class="container-fluid">
                                <div class="container">
                                    <h1 style="text-transform: uppercase; font-family: Roboto; font-weight: 600; text-align: center; margin-top: 60px; margin-bottom: 50px;" class="">Les chapitres de dernier mon roman</h1>
                                </div>
                            </div>
                            <div class="container">
                                <div class="row">

<?php
while ($data = $posts->fetch(PDO::FETCH_ASSOC))
{
?>

                                    <div class="col-lg-12 mt-5 mb-3">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-lg-4 mb-0" style="display: flex;">
                                                    <img src="assets/images/<?= $data['picture'] ?>" width="100%" style="box-shadow: 0px 10px 20px;" class="mb-5">
                                                </div>
                                                <div class="col-lg-8">
                                                    <h4 class="mb-2" style="font-family: Roboto; text-transform: uppercase;"><?= htmlspecialchars($data['title']) ?></h4>
                                                    <h6 class="mb-4" style="font-family: Lato; color: #535050;">Le <?= $data['creation_date_fr'] ?></h6>
                                                    <p class="text-justify" style="font-family: Lato; color: #535050;"><?php $content = strip_tags(substr($data['content'],0,500)); echo nl2br(htmlspecialchars($content)). "..."; ?></p>
                                                    <a href="index.php?action=post&amp;id=<?= $data['id'] ?>" class="btn btn-light btn-md" role="button" aria-pressed="true">Voir le chapitre complet</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

<?php
}
$posts->closeCursor();
?>

                                </div>
                                    <ul class="pagination justify-content-center mt-5">

<?php
while($customPagination < $pagination)
{
?>

                                        <li class="page-item">
                                            <a class="page-link" href="index.php?action=listPosts&amp;page=<?php echo ($customPagination+1); ?>"><?php echo ($customPagination+1); ?></a>
                                        </li>

<?php
$customPagination++;
}
?>

                                    </ul>
                            </div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
