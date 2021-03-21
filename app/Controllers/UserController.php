<?php

namespace App\Controllers;

require_once('./app/Models/UserModel.php');


use App\Controllers\Controller;
use App\Models\UserModel;

class Usercontroller extends Controller
{
    private $adminmail = 'admin@mail.com';
    private $adminpass = 'admin123*%';

    public function login()
    /* méthode permettrant de se connecter en tant qu'administrateur, la variable de session n'étant pas totalement infaillible en terme de sécurité
    elle sera remplacée par la suite lorsque la classe AdminController sera fonctionnelle */
    {
        if ($_SESSION['admin'] == false) {
            if (isset($_POST['connexion'])) {
                $mail = $_POST['mail'];
                $password = $_POST['password'];
                if (filter_var($mail, FILTER_VALIDATE_EMAIL) && $mail == $this->adminmail && $password == $this->adminpass) {
                    $_SESSION['admin'] = true;
                    header('Location:/accueil');
                    return $_SESSION['admin'];
                }
            }
            $this->render('auth/login');
        } else {
            header('Location:/accueil');
        }
    }

    public function logout()
    /* méthode permettrant de se déconnecter et d'effacer la session */
    {
        session_destroy();
        header('Location:/');
    }

    public function userMain()
    /* méthode permettrant d'afficher la page de choix utilisateurs */
    {
        if ($this->authorization() == true) {
            $this->render('users/main');
        }
    }

    public function registUser()
    /* méthode permettrant d'enregistrer un utilisateur
    on récupère les données depuis le formulaire ensuite on utilise la méthode "clean" diminuer le risque de faille XSS
    et on finit par rediriger l'admin vers la liste des utilisateurs
    */
    {
        if ($this->authorization() == true) {
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
                    header('Location:/utilisateur/liste');
                }
            }
            $this->render('form/userCreationForm');
        }
    }

    public function showUsers()
    /* méthode permettrant de faire afficher la liste des utilisateurs en récupérants les données dans la BDD
    puis de les envoyer à la vue désignée
    */
    {
        if ($this->authorization() == true) {
            $userModel = new UserModel();
            $users = $userModel->getUsers();
            $this->render('users/listUsers', ['users' => $users]);
        }
    }

    public function updateUser()
    /* méthode permettrant de récupérer les informations du formulaire de modification 
    de les nettoyer et de les envoyer à la BDD
    */
    {
        if ($this->authorization() == true) {
            $userModel = new UserModel();
            $id = $_GET['id'];
            $user = $userModel->getUser($id);

            if (isset($_POST['modifier'])) {
                $name = $_POST['name'];
                $firstname = $_POST['firstname'];
                $mail = $_POST['mail'];
                $name = $this->clean($name);
                $firstname = $this->clean($firstname);
                $mail = $this->clean($mail);
                $userModel->updateUser($id, $name, $firstname, $mail);
                $user = $userModel->getUser($id);
                header('Location:/utilisateur/liste');
            }
            $this->render('form/updateUser', ['user' => $user]);
        }
    }

    public function deleteUser()
    /* méthode permettrant de récupérer l'id utilisateur qui est passé dans l'url
    et d'appliquer la méthode de suppression
    */
    {
        if ($this->authorization() == true) {
            $userModel = new UserModel();
            $id = $_GET['id'];
            if (isset($id)) {
                $userModel->deleteUser($id);
                header('Location:/utilisateur/liste');
            }
        }
    }
}
