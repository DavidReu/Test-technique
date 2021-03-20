<?php

namespace App\Controllers;

require_once('./app/Models/ComputerModel.php');

use App\Controllers\Controller;
use App\Models\ComputerModel;

class ComputerController extends Controller
{
    public function computerMain()
    {
        $this->render('computer/mainComputer');
    }

    public function registComputer()
    {
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

    public function showComputers()
    {
        $computerModel = new ComputerModel();
        $computers = $computerModel->getComputers();
        $this->render('computer/listComputers', ['computers' => $computers]);
    }

    public function updateComputer()
    {
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

    public function deleteComputer()
    {
        $computerModel = new ComputerModel();
        $id = $_GET['id'];
        if (isset($id)) {
            $computerModel->deleteComputer($id);
            header('Location:/ordinateur/liste');
        }
    }
}
