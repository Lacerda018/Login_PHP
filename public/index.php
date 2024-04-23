<?php
// session_start();

// use app\library\GoogleClient;
// use app\library\Authenticate;

// require '../vendor/autoload.php';

// $googleClient = new GoogleClient;
// try {
//         $googleClient->init();
//         } catch (\Google\Exception $e) {
//     }
//     $auth = new Authenticate;
//     try {
//         if ($googleClient->authorized()) {
//             $auth->authGoogle($googleClient->getData());
//         }
//     } catch (\Google\Service\Exception $e) {
//     }
//     try{
//         if(isset($authUser)){            
//             if ($_SERVER["REQUEST_METHOD"] == "POST") {
//                 $authInstance->authUser();
//             }
            
//         }
//     }catch (Exception){}

// if(isset($_GET['logout'])) {
//     $auth->logout();
// }

// $authUrl = $googleClient->generateAuthLink();
session_start();

use app\library\Authenticate;
use app\library\GoogleClient;

require '../vendor/autoload.php';

$googleClient = new GoogleClient;
$googleClient->init();
$auth = new Authenticate;
if ($googleClient->authorized()) {
    $auth->authGoogle($googleClient->getData());
}

if(isset($_GET['logout'])) {
    $auth->logout();
}

$authUrl = $googleClient->generateAuthLink();


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/util.css">
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    

    <div class="limiter">
        
        <div class="container-login100">
        Olá,
        <?php
            if(isset($_SESSION['user'], $_SESSION['auth'])):
                echo $_SESSION['user']->firstName . ' ' . $_SESSION['user']->lastName;
        ?>  
            <a href="?logout=true">Logout</a>
                <?php else: ?>
                    Visitante
                <?php endif ?>
            <div class="wrap-login100">
                <div class="login100-pic js-tilt" data-tilt>
                    <img src="/Lacerda.png" alt="IMG">
                </div>

                <div class="formulario">
                    <form method="post" action="index.php" class="mb-3">
                        <label for="email">E-mail:</label>
                        <input type="email" name="email" required class="form-control form-control-sm">

                        <label for="senha">Senha:</label>
                        <input type="password" name="senha" required class="form-control form-control-sm">

                        <input type="submit" value="Logar" class="btn btn-primary">
                        <a href="<?php echo $authUrl; ?>">Logar com o google</a>
                    </form>
                    <div class="container-login100-form-btn">
                        <a href="create.php">Registre-se</a>
                        <a href="update.php">Atualizar</a>
                        <a href="delete.php">Deletar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>
