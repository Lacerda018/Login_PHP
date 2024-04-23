<?php

namespace app\database;

use PDOException;
use PDO;
use phpseclib3\Common\Functions\Strings;

class Connect
{
    public static function connect()
    {
        try {
            $pdo = new PDO('sqlite:google_login.db');
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
            return $pdo;
        } catch (PDOException $e) { 
            echo "Erro de conexão: " . $e->getMessage();
            exit();
        }
    }
}

        // try {    
        //     $pdo = new PDO('sqlite:google_login.db');
        //     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //     $query = "CREATE TABLE IF NOT EXISTS users (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, nome TEXT NOT NULL, email TEXT NOT NULL UNIQUE, senha TEXT NOT NULL, avatar TEXT)";
        //     $pdo->exec($query);
        //     echo "Connected successfully";
        // } catch (PDOException $e) {
        //     echo "Connection failed:" . $e->getMessage();
        //     exit;
        // }

        // return new PDO('sqlite:Users\User\Desktop\Dev\testeCrudArquivo\app\database', [PDO::ATTR_DEFAULT_FETCH_MODE  => PDO::FETCH_OBJ]);
