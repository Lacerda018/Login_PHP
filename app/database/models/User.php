<?php


namespace app\database\models;
use app\library\Authenticate;
use PDO;
use phpseclib3\Common\Functions\Strings;
use app\database\Connect;


class User extends Model
{
    protected string $table = 'users';

    public function insert(array $data)
    {
        try {
            $connect = Connect::connect();
            $prepare = $connect->prepare("insert into $this->table(firstName,lastName,avatar,email) values(:firstName,:lastName,:avatar,:email)");

            return $prepare->execute($data);
        } catch (\PDOException $th) {
            var_dump($th->getMessage());
        }
    }

    public function insertUser($usersData, $pdo){
        require_once '../Connect.php';
        $query = "INSERT INTO `users` (nome, email, senha) VALUES(:nome, :email, :senha)";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':nome', $usersData['nome']);
        $stmt->bindParam(':email', $usersData['email']);
        $stmt->bindParam(':senha', $usersData['senha']);
        $stmt->execute();
        echo 'Quantidades de registros: ' . $stmt->rowCount() . '<br />';
        echo 'ID do último registro inserido: ' . $pdo->lastInsertId();

        $stmt = null;
        $pdo = null;
    }
    
}
