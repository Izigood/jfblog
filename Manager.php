<?php

require('config/config.php');

class Manager
{
    protected function dbConnect()
    {
        $db = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME.';charset=utf8', DB_USERNAME, DB_PASSWORD);
        $db->query('SET lc_time_names = "fr_FR"');
        return $db;
    }
}
