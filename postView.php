<?php ob_start(); ?>        
        
                            <div class="container-fluid">
                                <div class="container">
                                    <div class="col-lg-12">
                                    <h1 style="text-transform: uppercase; font-size: 2em; font-family: Roboto; font-weight: 600; text-align: center; margin-top: 60px; margin-bottom: 50px;"><?= htmlspecialchars($post['title']) ?></h1>
                                    </div>
                                </div>
                            </div>
                            <div class="container">
                                <div class="row">
                                    <div class="container mb-5">
                                        <a href="index.php?action=listPosts&amp;page=<?= $_COOKIE['page'] ?>" style="color: #5aa2db; text-decoration: none; font-family: Roboto;" class="">&nbsp;&lt;&lt; Retour vers la liste de tous les chapitres</a>
                                    </div>
                                    <div class="col-lg-12 mt-3 mb-3">
                                        <div class="container">
                                            <div class="row">
                                    <div class="col-lg-12 d-flex justify-content-center mt-4">
                                        <img src="assets/images/<?= $post['picture'] ?>" style="box-shadow: 0px 10px 20px;" class="mb-5" width="70%" height="70%">
                                    </div> 
                                    <div class="mb-5">
                                        <h6 style="font-family: Lato; color: #23262a; text-transform: uppercase; text-align: right; font-size: 1.1em;" class="mb-0"><?= htmlspecialchars($post['author']) ?></h6>
                                        <h6 class="mb-4" style="font-family: Lato; color: #535050; text-align: right;">Le <?= $post['creation_date_fr'] ?></h6>
                                        <p class="text-justify" style="font-family: Lato; color: #535050;"><?php $content = strip_tags($post['content']); echo nl2br(htmlspecialchars($content)) ?></p>
                                    </div>
                                    <div class="col-lg-12 mb-5" style="color: #000000;"><a id="form"></a>
                                        <h4 style="font-family: Roboto; text-transform: uppercase;" class="">Vos avis sur ce chapitre</h4>
                                        <div class="container"> 
                                            <div class="row">
                                                <div class="col-lg-12 mt-3 mb-3">
                                                    <div class="container">
                                                        <div class="row">

<?php
while ($comment = $comments->fetch())
{
?>

                                                            <div class="col-lg-8">
                                                                <h6 style="font-family: Lato; color: #000000; text-transform: capitalize; text-align: right; font-size: 1.2em;" class="mb-0 text-left mt-3"><?= htmlspecialchars($comment['pseudo']) ?></h6>
                                                                <h6 class="mb-4 text-left" style="font-family: Lato; color: #535050; text-align: right;">Le <?= $comment['comment_date_fr'] ?></h6>
                                                                <p style="font-family: Lato; color: #535050; font-size: 0.8em;" class="text-justify"><?php if($comment['reporting'] == "Signalé"){echo "<s>".nl2br(htmlspecialchars($comment['comment']))."</s>";} else{ echo nl2br(htmlspecialchars($comment['comment'])); } ?></p>
                                                                <p style="font-family: Lato; color: #f50404; font-size: 0.8em;" class="text-justify"><?php if($comment['reporting'] == "Signalé"){echo '<span style="color: red;">Le commentaire a été signalé</span>';} ?></p>
                                                            </div>
                                                            <div class="col-lg-4 d-flex flex-column-reverse">
                                                                <!-- <a href="index.php?action=reportComment&amp;id=<?= $comment['id']?>&amp;postId=<?= $comment['post_id'] ?>" style="color: #5aa2db; text-decoration: none; text-align: right;"><a href="#form"> >> Signaler le commentaire</a></a> -->
                                                                <a href="index.php?action=reportComment&amp;id=<?= $comment['id']?>&amp;postId=<?= $comment['post_id'] ?>" class="btn btn-danger btn-md" role="button" aria-pressed="true">Signaler le commentaire</a>
                                                            </div>

<?php
}
?>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <h4 class="mt-5 pb-0 mb-0" style="font-family: Roboto; text-transform: uppercase;">Laissez-moi votre avis</h4>
                                        <h4 class="mb-2 mt-5 d-flex justify-content-center" style="font-family: Roboto; text-transform: uppercase;"></h4>
                                        <form action="index.php?action=addComment&amp;id=<?= $post['id'] ?>" method="post">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="pseudo" id="pseudo" placeholder="Votre pseudo..." required>
                                                <textarea class="form-control mt-3" rows="3" name="comment" id="comment" placeholder="Votre avis..." required></textarea>
                                                <button href="#form" type="submit" class="btn btn-light mt-3" style="width: 100%; font-family: Roboto; text-transform: uppercase; letter-spacing: 0.2em;">Publiez votre avis</button>
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