<?php

namespace App\Controllers;

require_once('./app/Models/UserModel.php');


use App\Controllers\Controller;
use App\Models\UserModel;

class Usercontroller extends Controller
{
    public function login()
    {
        $adminmail = 'admin@mail.com';
        $adminpass = 'admin123*%';


        if (isset($_POST['connexion'])) {
            $mail = $_POST['mail'];
            $password = $_POST['password'];
            if (filter_var($mail, FILTER_VALIDATE_EMAIL) && $mail == $adminmail && $password == $adminpass) {
                $_SESSION['admin'] = true;
                header('Location:/');
                return $_SESSION['admin'];
            }
        }
        $this->render('auth/login');
    }

    public function logout()
    {
        session_destroy();
        header('Location:/');
    }

    public function userMain()
    {
        $this->render('users/main');
    }

    public function registUser()
    {
        $userModel = new UserModel();
        if (isset($_POST['regist'])) {
            $mail = $_POST['mail'];
            $name = $_POST['name'];
            $firstname = $_POST['firstname'];
            $mail = $this->clean($mail);
            $name = $this->clean($name);
            $firstname = $this->clean($firstname);
            if (!empty($mail) && !empty($name) && !empty($firstname) && filter_var($mail, FILTER_VALIDATE_EMAIL) && preg_match('/^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/', $mail)) {
                $userModel->register($name, $firstname, $mail);
                header('Location:/');
            }
        }
        $this->render('form/userCreationForm');
    }

    public function showUsers()
    {
        $userModel = new UserModel();
        $users = $userModel->getUsers();
        $this->render('users/listUsers', ['users' => $users]);
    }
}
