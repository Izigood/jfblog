<?php

spl_autoload_register(function($class)
{
    require_once 'models/'. $class .'.php';
});

function listPosts($page, $postsDisplay, $customPagination)
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
        $posts = $postManager->readAllPosts($page, $postsDisplay);

        require('views/frontend/listPostsView.php');
    }
}

function post($postId)
{
    $postManager = new PostsManager();
    $commentManager = new CommentsManager();

    $post = $postManager->readPost($postId);
    $comments = $commentManager->readAllComments($postId);

    if($post === false){
        throw new Exception('Désolé mais le chapitre que vous demandez n\'existe pas !');
    }
    else{
        require('views/frontend/postView.php');
    }
}

function addComment($postId, $pseudo, $comment)
{
    $commentManager = new CommentsManager();

    $affectedLines = $commentManager->createComment($postId, $pseudo, $comment);

    if ($affectedLines === false) {
        throw new Exception('Désolé mais il ne m\'est pas possible d\'ajouter votre commentaire !');
    }
    else {
        header('Location: index.php?action=post&id=' . $postId);
    }
}

function reportComment($commentId, $postId)
{
    $commentManager = new CommentsManager();
    $affectedLines = $commentManager->updateReportComment($commentId);

    if ($affectedLines === false) {
        throw new Exception('Désolé mais il ne m\'est pas possible de signaler le commentaire sélectionné !');
    }
    else {
        header('Location: index.php?action=post&id=' . $postId);
    }
}

function admin($login, $password)
{
    $login = htmlspecialchars($_POST['login']);
    $password = hash('sha1', htmlspecialchars($_POST['password']));

    $userManager = new UsersManager();
    $user = $userManager->connectionUser($login, $password);

    if($user === false){
        $message = "Désolé Monsieur Forteroche mais votre identifiant ou votre mot de passe saisi est incorrect !";
        require('views/frontend/loginView.php');
    }

    else{
        session_start();
        $_SESSION['login'] = $login;
        $_SESSION['password'] = $password;
        header('Location: index.php?action=dashboard');
    }
}
