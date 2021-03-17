<?php

namespace App\Controllers;


use App\Controllers\Controller;

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
}
