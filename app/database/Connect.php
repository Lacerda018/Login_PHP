<?php

namespace app\database;

use PDO;
use phpseclib3\Common\Functions\Strings;

class Connect
{
    public static function connect(): PDO

    {
        return new PDO('sqlite: /Users/User/Documents/BD/google_login.db', string[
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
        ])
    }
}

//root@127.0.0.1:3306