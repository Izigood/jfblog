<?php

require_once("models/Manager.php");

class PostsManager extends Manager
{
    public function readAllPosts($page, $postsDisplay)
    {

        $start = $page * $postsDisplay - $postsDisplay;

        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, picture, title, content, author, DATE_FORMAT(creation_date, \'%d %M %Y à %Hh%imin\') AS creation_date_fr FROM posts ORDER BY creation_date DESC LIMIT '.$start.','.$postsDisplay);
        $req->execute(array($start, $postsDisplay));

        return $req;
    }

    public function allPosts($page, $postsDisplay)
    {
        $start = $page * $postsDisplay - $postsDisplay;

        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, picture, title, content, author, DATE_FORMAT(creation_date, \'%d %M %Y à %Hh%imin\') AS creation_date_fr FROM posts ORDER BY creation_date DESC lIMIT '.$start.','.$postsDisplay);
        $req->execute(array($start, $postsDisplay));

        return $req;
    }

    public function fivePosts()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, picture, title, content, author, DATE_FORMAT(creation_date, \'%d %M %Y à %Hh%imin\') AS creation_date_fr FROM posts ORDER BY creation_date DESC LIMIT 0, 5');
        
        return $req;
    }

    public function readPost($postId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, picture, title, content, author, DATE_FORMAT(creation_date, \'%d %M %Y à %Hh%imin\') AS creation_date_fr FROM posts WHERE id = ?');
        $req->execute(array($postId));
        $post = $req->fetch(PDO::FETCH_ASSOC);

        return $post;
    }

    public function createPost($picture, $title, $content)
    {
        $db = $this->dbConnect();
        $posts = $db->prepare('INSERT INTO posts(picture, title, content, author, creation_date) VALUES (?, ?, ?, "Jean Forteroche", NOW())');
        $posts->execute(array($picture, $title, $content));

        return $posts;
    }

    public function updatePost($postId, $picture, $title, $content)
    {
        $db = $this->dbConnect();
        $post = $db->prepare('UPDATE posts SET picture = :picture, title = :title, content = :content  WHERE id = :id');
        $result = $post->execute(array(
            'picture' => $picture,
            'title' => $title,
            'content' => $content,
            'id' => $postId
        ));
        return $result;
    }

    public function countPosts()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT count(*) as nbr FROM posts');
        $nbr = $req->fetch();

        return $nbr;
    }

    public function erasePost($postId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('DELETE FROM posts WHERE id = ?');
        $result = $req->execute(array($postId));

        return $result;
    }

    public function picturePost($pictureId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT picture FROM posts WHERE id = ?');
        $req->execute(array($pictureId));
        $result = $req->fetch(PDO::FETCH_ASSOC);
        
        return $result;
    }
}
