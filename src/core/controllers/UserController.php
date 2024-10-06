<?php

namespace core\controllers;

use core\models\User;
use services\Helper;

class UserController
{

    public function registration()
    {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $password_confirm = $_POST['password_confirm'];
        $User = new User();
        $User -> registerUser( $email, $password, $password_confirm);
        Helper::redirect('/log-in');
    }

    public function login()
    {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $User = new User();
        $User -> loginUser($email, $password);
        Helper::redirect('/');
    }

    public function logout()
    {
        session_destroy();
        unset($_SESSION['user']);
        Helper::redirect('/');
    }

}