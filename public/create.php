<?php

require '../vendor/autoload.php';

/*$data = [
    'nome' => $_POST['nome'],
    'email' => $_POST['email'],
    'senha' => password_hash($_POST['senha'], PASSWORD_DEFAULT)
];

$email = $_POST['email'];

function emailExiste($email, $nomeArquivo)
{
    $emails = json_decode(file_get_contents($nomeArquivo), true);
    foreach ($emails as $usuario){
        if ($usuario['email'] === $email){
            return true;
        }
    }
    return false;
}

$nomeArquivo = sprintf('%s/users.json', __DIR__);

if(emailExiste($email, $nomeArquivo)){
    echo "Este e-mail já está cadastrado";
    return;
}

if (!file_exists(sprintf('%s/users.json', __DIR__))) {
    file_put_contents(sprintf('%s/users.json', __DIR__), json_encode([$data]));
    echo "Cadastro efetuado com sucesso!";
    return;
}

$usuariosAtuaisArray = json_decode(file_get_contents(sprintf('%s/users.json', __DIR__)));

$usuariosAtuaisArray[] = $data;

if (file_put_contents(sprintf('%s/users.json', __DIR__), json_encode($usuariosAtuaisArray))) {
    echo "Cadastro efetuado com sucesso!";
}*/
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="css/util.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Cadastro</title>
</head>
<body>
<div class="limiter">
    <div class="container-login100">
        <div class="login100-pic js-tilt" data-tilt>
            <img src="Lacerda.png" alt="IMG">
        </div>
        <div class="wrap-login100">

            <div class="formulario">
                <form method="post" action="create.php" class="mb-3">
                    <label for="nome" class="form-label ">Nome:</label>
                    <input type="text" name="nome" required class="form-control form-control-sm">

                    <label for="email">E-mail:</label>
                    <input type="email" name="email" required class="form-control form-control-sm">

                    <label for="senha">Senha:</label>
                    <input type="password" name="senha" required class="form-control form-control-sm">

                    <input type="submit" value="Inserir" class="btn btn-primary">
                </form>
                <div class="container-login100-form-btn">
                    <a href="public/index.php">Login</a>
                    <a href="update.html">Atualizar</a>
                    <a href="delete.html">Deletar</a>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>