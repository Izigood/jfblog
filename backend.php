<?php

spl_autoload_register(function($class)
{
    require 'models/'. $class .'.php';
});

function checkSession(){
    if(empty($_SESSION['login'])){
        $message = "Désolé Monsieur Forteroche mais votre identifiant ou votre mot de passe n'a pas été correctement saisi !";
        require ('views/frontend/loginView.php');
        exit;
    }
}

function posts($page, $postsDisplay, $customPagination)
{
    $postManager = new PostsManager();
    $nbrPosts = $postManager->countPosts();

    $number = $postsDisplay;
    $pagination = ceil($nbrPosts[0] / $postsDisplay);

    if($page > $pagination){
        throw new Exception('Désolé mais la page que vous demandez n\'existe pas !');
    }
    else{
        $postManager = new PostsManager();
        $posts = $postManager->allPosts($page, $postsDisplay);

        require('views/backend/articlesView.php');
    }
}

function onePost($postId)
{
    $postManager = new PostsManager();
    $post = $postManager->readPost($postId);

    require ('views/backend/updateArticleView.php');
}

function nbrDashboard()
{
    $postManager = new PostsManager();
    $posts = $postManager->countPosts();

    $commentManager = new CommentsManager();
    $comments = $commentManager->countComments();

    $commentManager = new CommentsManager();
    $reportingComments = $commentManager->countReportingComments();

    $postManager = new PostsManager();
    $fivePosts = $postManager->fivePosts();
    
    $commentManager = new CommentsManager();
    $fiveComments = $commentManager->fiveComments();

    require ('views/backend/dashboardView.php');
}

function addPost($picture, $title, $content)
{
	$postManager = new PostsManager();
    $affectedLines = $postManager->createPost($picture, $title, $content);

	if ($affectedLines === false) {
        throw new Exception('Désolé Monsieur Forteroche mais il ne m\'a pas été possible d\'ajouter votre chapitre !');
    }
    else {
        header('Location: index.php?action=chapters');
    }    
}

function changePost($postId, $picture, $title, $content)
{
    $postManager = new PostsManager();
    $affectedLines = $postManager->updatePost($postId, $picture, $title, $content);
    
    if ($affectedLines === false) {
        throw new Exception('Désolé Monsieur Forteroche mais il ne m\'a pas été possible de modifier votre chapitre !');
    }
    else {
        header('Location: index.php?action=readPost&id='.$postId);   
    }    
}

function deletePost($postId) 
{
    $postManager = new PostsManager();
    $affectedLines = $postManager->erasePost($postId);
    

    if ($affectedLines === false) {
        throw new Exception('Désolé Monsieur Forteroche mais il ne m\'a pas été possible d\'effacer votre chapitre !');
    }
    else {
        header('Location: index.php?action=chapters');
    }
}

function selectPicture($pictureId)
{
    $postManager = new PostsManager();
    $result = $postManager->picturePost($pictureId);

    $picture = $result['picture'];
    
    return $picture;
}

function comments()
{
    $commentManager = new CommentsManager();
    $comments = $commentManager->allComments();

    require('views/backend/commentsView.php');
}

function unlockingComment($commentId)
{
    $commentManager = new CommentsManager();
    $comments = $commentManager->updateLockComment($commentId);
    
    if ($affectedLines === false) {
        throw new Exception('Désolé Monsieur Forteroche mais il ne m\'a pas été possible de débloquer le commentaire signalé !');
    }
    else {
        header('Location: index.php?action=comments');
    }
}

function deleteComments($postId)
{
    $commentManager = new CommentsManager();
    $comments = $commentManager->eraseComments($postId);
}

function deleteComment($postId)
{
    $commentManager = new CommentsManager();
    $comment = $commentManager->eraseComment($postId);

}