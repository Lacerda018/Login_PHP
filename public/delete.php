<?php

require '../vendor/autoload.php';

$nome = $_POST['nome'];
$senha = $_POST['senha'];

if (!file_exists(sprintf('%s/users.json', __DIR__))) {
    echo 'Banco de dados não encontrado.';

    return;
}

$usuarios = json_decode(file_get_contents(sprintf('%s/users.json', __DIR__)), true);

$usuarioParaAtualizar = null;

foreach ($usuarios as $key => $usuario) {
    if ($usuario['email'] === $_POST['email']) {
        $usuarioParaAtualizar = $key;

        break;
    }
}

if (is_null($usuarioParaAtualizar)) {
    echo 'Usuário não encontrado.';

    return;
}

if ($_POST['senha'] === $usuarios[$usuarioParaAtualizar]['senha']) {
    array_splice($usuarios[$usuarioParaAtualizar], 1);

    if (file_put_contents(sprintf('%s/users.json', __DIR__), json_encode($usuarios))) {
        echo 'Usuário deletado com sucesso!';
    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/util.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Deletar Cadastro</title>
</head>
<body>
<div class="limiter">
    <div class="container-login100">
        <div class="login100-pic js-tilt" data-tilt>
            <img src="Lacerda.png" alt="IMG">
        </div>
        <div class="wrap-login100">
        <div class="formulario">
            <form method="post" action="delete.php" class="mb-3">
                <label for="email" class="form-label ">Email:</label>
                <input type="email" name="email" required class="form-control form-control-sm">

                <label for="senha" class="form-label ">Digite a senha para excluir</label>
                <input type="password" name="senha" required class="form-control form-control-sm">
                <input type="submit" value="Excluir" class="btn btn-primary">
            </form>
            <div class="container-login100-form-btn">
                <a href="public/index.php">Login</a>
            </div>
        </div>
        </div>
    </div>
</div>
</body>
