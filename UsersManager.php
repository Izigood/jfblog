<?php

require_once("models/Manager.php");

class UsersManager extends Manager
{
    public function connectionUser($login, $password)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT login, password FROM users WHERE login = ? AND password = ?');
        $req->execute(array($login, $password));
        $admin = $req->fetch(PDO::FETCH_ASSOC);
        
        return $admin;
    }
}
