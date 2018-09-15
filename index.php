<?php

require('controllers/frontend.php');
require('controllers/backend.php');
require('controllers/functions.php');

try {
    if (isset($_GET['action']) && !empty($_GET['action'])) {
        
        // FRONTEND ACCESS
        
        if ($_GET['action'] == 'listPosts') {
            listPostsAccess();
        }
        elseif ($_GET['action'] == 'post') {
            postAccess();
        }
        elseif ($_GET['action'] == 'addComment') {
            addCommentAccess();
        }
        elseif ($_GET['action'] == 'reportComment') {
            reportCommentAccess();
        }
        elseif ($_GET['action'] == 'connection'){
            connectionAccess();
        }
        elseif ($_GET['action'] == 'login'){
            loginAccess();
        }

        // BACKEND ACCESS

        elseif($_GET['action'] == 'dashboard'){
            dashboardAccess();
        }
        elseif ($_GET['action'] == 'chapters'){
            chaptersAccess();
        }
        elseif ($_GET['action'] == 'newPost'){
            newPostAccess();
        }
        elseif ($_GET['action'] == 'createPost'){
            createPostAccess();
        }
        elseif ($_GET['action'] == 'readPost'){
            readPostAccess();
        }
        elseif ($_GET['action'] == 'updatePost'){
            updatePostAccess();
        }
        elseif ($_GET['action'] == 'deletePost'){
            deletePostAccess();
        }
        elseif ($_GET['action'] == 'comments'){
            commentAccess();
        }
        elseif ($_GET['action'] == 'unlockingComment'){
            unlockingCommentAccess();
        }
        elseif ($_GET['action'] == 'deleteComment'){
            deleteCommentAccess();
        }
        elseif ($_GET['action'] == 'deconnection'){
            deconnectionAccess();
        }
        elseif($_GET['action'] != 'listPosts' ){
          throw new Exception('Monsieur Forteroche est désolé mais la page que vous demandez n\'existe pas !');
        }
    }

    // DEFAULT PAGE ACCESS

    else {
        pageDefaultAccess();
    }
}
catch(Exception $e) {
    $message = $e->getMessage();
    require ('views/frontend/errorView.php');
    exit;
}
