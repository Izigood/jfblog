<?php

require_once("models/Manager.php");

class CommentsManager extends Manager
{
    public function readAllComments($postId)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('SELECT id, pseudo, comment, reporting, post_id, DATE_FORMAT(comment_date, \'%d %M %Y à %Hh%imin\') AS comment_date_fr FROM comments WHERE post_id = ? ORDER BY comment_date DESC');
        $comments->execute(array($postId));

        return $comments;
    }

    public function allComments()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, pseudo, comment, reporting, DATE_FORMAT(comment_date, \'%d %M %Y à %Hh%imin\') AS comment_date_fr FROM comments WHERE reporting="Signalé" ORDER BY comment_date DESC'); 
        
        return $req;
    }

    public function fiveComments()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, pseudo, comment, reporting, DATE_FORMAT(comment_date, \'%M %Y à %Hh%imin\') AS comment_date_fr FROM comments ORDER BY comment_date DESC LIMIT 0,5'); 
        
        return $req;
    }

    public function createComment($postId, $pseudo, $comment)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('INSERT INTO comments(post_id, pseudo, comment, comment_date) VALUES(?, ?, ?, NOW())');
        $affectedLines = $comments->execute(array($postId, $pseudo, $comment));

        return $affectedLines;
    }

    public function updateReportComment($commentId)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('UPDATE comments SET reporting = "Signalé", reporting_date = NOW()  WHERE id = ?');
        $affectedLines = $comments->execute(array($commentId));

        return $affectedLines;
    }

    public function updateLockComment($commentId)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('UPDATE comments SET reporting = "Normal", reporting_date = NOW()  WHERE id = ?');
        $affectedLines = $comments->execute(array($commentId));

        return $affectedLines;
    }

    public function countComments()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT count(*) as nbr FROM comments');
        $nbr = $req->fetch();

       return $nbr;
    }

    public function countReportingComments()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT count(*) FROM comments WHERE reporting = "Signalé"');
        $nbr = $req->fetch();

        return $nbr;
    }

    public function eraseComment($postId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('DELETE FROM comments WHERE id = ?');
        $affectedLines = $req->execute(array($postId));
        
        return $affectedLines;
    }
}
