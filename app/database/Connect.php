<?php

namespace app\database;

use PDO;

class Connect
{
    public static function connect(): PDO

    {
        return new PDO('mysql:host=localhost;dbname=google_login', 'root', 'Rockeiro123', [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
        ]);
    }
}

//root@127.0.0.1:3306