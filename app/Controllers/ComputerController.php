<?php

namespace App\Controllers;

require_once('./app/Models/ComputerModel.php');

use App\Controllers\Controller;
use App\Models\ComputerModel;

class ComputerController extends Controller
{
    public function computerMain()
    /* 
    méthode permettrant d'afficher la page de choix ordinateur
    */
    {
        if ($this->authorization() == true) {
            $this->render('computer/mainComputer');
        }
    }

    public function registComputer()
    /* 
    méthode permettrant d'enregistrer un ordinateur dans la BDD en récupérant
    les données depuis un formulaire
    */
    {
        if ($this->authorization() == true) {
            $ComputerModel = new ComputerModel();
            if (isset($_POST['regist'])) {
                $brand = $_POST['brand'];
                $username = $_POST['username'];
                $status = $_POST['status'];
                $brand = $this->clean($brand);
                $username = $this->clean($username);
                $status = $this->clean($status);
                if (!empty($brand) && !empty($username) && !empty($status)) {
                    $ComputerModel->register($brand, $username, $status);
                    header('Location:/ordinateur/liste');
                }
            }
            $this->render('form/computerCreationForm');
        }
    }

    public function showComputers()
    /* 
    méthode permettrant de récupérer les informations des ordinateurs et les passer
    à la vue désignée
    */
    {
        if ($this->authorization() == true) {
            $computerModel = new ComputerModel();
            $computers = $computerModel->getComputers();
            $this->render('computer/listComputers', ['computers' => $computers]);
        }
    }

    public function updateComputer()
    /* 
    méthode permettrant de modifier les informations d'un ordinateur
    avec les données récupéré dans le formulaire de modification
    */
    {
        if ($this->authorization() == true) {
            $computerModel = new ComputerModel();
            $id = $_GET['id'];
            $computer = $computerModel->getComputer($id);

            if (isset($_POST['modifier'])) {
                $brand = $_POST['brand'];
                $username = $_POST['username'];
                $status = $_POST['status'];
                $brand = $this->clean($brand);
                $username = $this->clean($username);
                $status = $this->clean($status);
                $computerModel->updateComputer($id, $brand, $username, $status);
                $computer = $computerModel->getComputer($id);
                header('Location:/ordinateur/liste');
            }
            $this->render('form/updateComputer', ['computer' => $computer]);
        }
    }

    public function deleteComputer()
    /* 
    méthode permettrant de récupérer l'id d'un ordinateur dans l'url 
    et de l'utiliser pour supprimer cette ordinateur
    */
    {
        if ($this->authorization() == true) {
            $computerModel = new ComputerModel();
            $id = $_GET['id'];
            if (isset($id)) {
                $computerModel->deleteComputer($id);
                header('Location:/ordinateur/liste');
            }
        }
    }
}
