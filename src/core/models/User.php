<?php

namespace core\models;

use services\Connect;
use services\Helper;

class User
{

    public function registerUser( $email, $password, $password_confirm)
    {

        if(!filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            Helper::setValidationError('email', 'Указана неправильная почта');
        }

        if(empty($password))
        {
            Helper::setValidationError('password', 'Пароль пустой');
        }

        if($password !== $password_confirm)
        {
            Helper::setValidationError('password', 'Пароли не совпадают');
        }

        if(!empty($_SESSION['validation']))
        {
            Helper::setOldValue('email', $email);
            Helper::redirect('/registration');
        }
        $password = password_hash($password, PASSWORD_DEFAULT);
        $query = Connect::Connect()->query("INSERT INTO `user`(`id`, `email`, `password`) VALUES (NULL,'$email','$password')");
    }

    public function loginUser($email, $password)
    {
        if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            Helper::setOldValue('email', $email);
            Helper::setValidationError('email', 'Неверный формат электронной почты');
            Helper::setMessage('error', 'Ошибка валидации');
            Helper::redirect('/log-in');
        }
        $query = Connect::Connect()->query("SELECT * FROM `user` WHERE email = '$email'");
        $user = mysqli_fetch_assoc($query);
        if(!$user){
            Helper::setMessage('error', "Пользователь $email не найден");
            Helper::redirect('/log-in');
        }

        if (!password_verify($password, $user['password']))
        {
            Helper::setMessage('error', "Неверный логин или пароль");
            Helper::redirect('/log-in');
        }

        if(password_verify($password, $user['password'])) {
            session_start();
            $_SESSION["user"] = [
              'id' => $user['id'],
              'email' => $user['email'],
              'password' => $user['password'],
              'role' => $user['role']
            ];
            if ($_SESSION["user"]["role"] != 0) {
                Helper::redirect('/admin-panel');
            }
        }
    }
}