<?php

// FRONTEND FUNCTIONS

function listPostsAccess()
{
    if(isset($_GET['page']) && !empty($_GET['page']) && $_GET['page'] > 0){
        $page = $_GET['page'];
      }
      else{
        $page = 1;
      }
      $postsDisplay = 6;
      $customPagination = 0;
      listPosts($page, $postsDisplay, $customPagination);
}

function postAccess()
{
    if (isset($_GET['id']) && $_GET['id'] > 0) {
        post($_GET['id']);
      }
      else {
          throw new Exception('Désolé mais le chapitre que vous demandez n\'existe pas !');
      }
}

function addCommentAccess()
{
    if (isset($_GET['id']) && $_GET['id'] > 0) {
        if (!empty($_POST['pseudo']) && !empty($_POST['comment'])) {
            addComment($_GET['id'], $_POST['pseudo'], $_POST['comment']);
        }
        else {
            throw new Exception('Désolé mais vous n\'avez pas rempli tous les champs !');
        }
    }
    else {
        throw new Exception('Désolé mais votre commentaire ne peut pas être ajouté !');
    }
}

function reportCommentAccess()
{
    if(isset($_GET['id']) && isset($_GET['postId'])){
        if($_GET['id'] > 0 && $_GET['postId'] > 0){
          reportComment($_GET['id'], $_GET['postId']);
        }
    }
    else {
        throw new Exception('Désolé mais votre commentaire n\'a pas été signalé !');
    }
}

function connectionAccess()
{
    $message = " ";
    require ('views/frontend/loginView.php');
}

function loginAccess()
{
    if(!empty($_POST['login']) && !empty($_POST['password'])) {
        admin($_POST['login'], $_POST['password']);
      }
      else{
        throw new Exception('Désolé mais cet espace est réservé à Monsieur Forteroche !');
      }
}

// BACKEND FUNCTIONS

function dashboardAccess()
{
    session_start();
    checkSession();
    nbrDashboard();
}

Function chaptersAccess()
{
    session_start();
    checkSession();
    if(isset($_GET['page']) && !empty($_GET['page']) && $_GET['page'] > 0){
        $page = $_GET['page'];
      }
      else{
        $page = 1;
      }
      $postsDisplay = 6;
      $customPagination = 0;
      posts($page, $postsDisplay, $customPagination);
}

function newPostAccess()
{
    session_start();
    checkSession();
    require ('views/backend/articleView.php');
}

function createPostAccess()
{
    session_start();
    checkSession();
    if(empty($_FILES['picture']['name']) && !empty($_POST['title']) && !empty($_POST['content'])){
        $filename = "default_image.jpeg";
        addPost($filename, $_POST['title'], $_POST['content']);
    }
    elseif (!empty($_FILES['picture']['name']) && !empty($_POST['title']) && !empty($_POST['content'])){
        if($_FILES['picture']['error'] == 0 && $_FILES['picture']['size'] <= 3000000){
            if(exif_imagetype($_FILES['picture']['tmp_name']) == 2){
            $filename = rand().".jpeg";
            $destination = 'assets/images/'.$filename;
            move_uploaded_file($_FILES['picture']['tmp_name'], $destination);
            addPost($filename, $_POST['title'], $_POST['content']);
            moveFile();
            }
            else{
                throw new Exception('Désolé Monsieur Forteroche mais l\'image doit être au format JPEG !');
            }
        }
        else{
            throw new Exception('Désolé Monsieur Forteroche mais la poid de l\'image ne doit pas dépasser 3 Mo !');
        }
    }
    else{
        throw new Exception('Désolé Monsieur Forteroche mais votre chapitre n\'a pas pu être publié !');
    }
}

function readPostAccess()
{
    session_start();
    checkSession();
    if(isset($_GET['id']) && $_GET['id'] > 0){
        onePost($_GET['id']);
    }
}

function updatePostAccess()
{
    session_start();
    checkSession();
    if(isset($_GET['id']) && $_GET['id'] > 0 && empty($_FILES['picture']['name']) && !empty($_POST['title']) && !empty($_POST['content'])){
        $filename = selectPicture($_GET['id']);
        changePost($_GET['id'], $filename, $_POST['title'], $_POST['content']);
    }
    elseif (isset($_GET['id']) && $_GET['id'] > 0 && !empty($_FILES['picture']['name']) && !empty($_POST['title']) && !empty($_POST['content'])){
        if($_FILES['picture']['error'] == 0 && $_FILES['picture']['size'] <= 3000000){
            if(exif_imagetype($_FILES['picture']['tmp_name']) == 2){
            $filename = selectPicture($_GET['id']);
            unlink("assets/images/".$filename);
            $filename = rand().".jpeg";
            $destination = 'assets/images/'.$filename;
            move_uploaded_file($_FILES['picture']['tmp_name'], $destination);
            changePost($_GET['id'], $filename, $_POST['title'], $_POST['content']);
            }
            else{
                throw new Exception('Désolé Monsieur Forteroche mais l\'image doit être au format JPEG !');
            }
        }
        else{
            throw new Exception('Désolé Monsieur Forteroche mais la poid de l\'image ne doit pas dépasser 3 Mo !');
        }
    }
    else{
        throw new Exception('Désolé Monsieur Forteroche mais votre chapitre n\'a pas pu être modifié !');
    }
}

function deletePostAccess()
{
    session_start();
    checkSession();
    if(isset($_GET['id']) && $_GET['id'] > 0){
        $filename = selectPicture($_GET['id']);
            if($filename == "default_image.jpeg"){
                deletePost($_GET['id']);
                deleteComments($_GET['id']);
                header('Location: index.php?action=articles');
            }
            else{
                unlink("assets/images/".$filename);
                deletePost($_GET['id']);
                deleteComments($_GET['id']);
                header('Location: index.php?action=articles');
            }
    }
    else{
        throw new Exception('Désolé Monsieur Forteroche mais votre chapitre n\'a pas pu être effacé ! !');
    }
}

function commentAccess()
{
    session_start();
    checkSession();
    comments();
}

function unlockingCommentAccess()
{
    session_start();
    checkSession();
    if(isset($_GET['id']) && $_GET['id'] > 0){
        unlockingComment($_GET['id']);
        header('Location: index.php?action=comments');
    }
    else{
        throw new Exception('Désolé Monsieur Forteroche mais le commentaire signalé n\'a pas pu être débloqué !');
    }
}

function deleteCommentAccess()
{
    if(isset($_GET['id']) && $_GET['id'] > 0){
        deleteComment($_GET['id']);
        header('Location: index.php?action=comments');
    }
    else{
        throw new Exception('Désolé Monsieur Forteroche mais le commentaire signalé n\'a pas pu être effacé !');
    }
}

function deconnectionAccess()
{
    session_start();
    $_SESSION = array();
    session_destroy();
    unset($_SESSION);
    header('Location: index.php?action=connection');
}

// INDEX DEFAULT PAGE FUNCTION

function pageDefaultAccess()
{
    $page = 1;
    $postsDisplay = 6;
    $customPagination = 0;
    listPosts($page,$postsDisplay,$customPagination);
}
