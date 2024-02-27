<?php

namespace app\library;


use app\database\models\User;

class Authenticate
{
    public function authGoogle($dataClass)
    {
        $user = new User;
        $userFound = $user->findBy('email', $dataClass->email);
        if(!$userFound){
            $user->insert([
                'firstName'=>$dataClass->givenName,
                'lastName'=>$dataClass->familyName,
                'email'=>$dataClass->email,
                'avatar'=>$dataClass->picture,
            ]);
        }

        $_SESSION['user'] = $userFound;
        $_SESSION['auth'] = true;
        header('location:/');
    }

    public function auth()
    {

    }

    public function logout()
    {
        unset($_SESSION['user'], $_SESSION['auth']);
        header('Location:/');
    }
}
