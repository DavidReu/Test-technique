<?php

namespace App\Controllers;

require_once('./app/Models/AttributionModel.php');
require_once('./app/Models/ComputerModel.php');
require_once('./app/Models/UserModel.php');

use App\Controllers\Controller;
use App\Models\AttributionModel;
use App\Models\ComputerModel;
use App\Models\UserModel;

class AttributionController extends Controller
{
    public function addAttribution()
    {
        $attributionModel = new AttributionModel();
        $userModel = new UserModel();
        $computerModel = new ComputerModel();
        $users = $userModel->getUsers();
        $computers = $computerModel->getComputers();

        if (isset($_POST['attribuer'])) {
            $date = $_POST['date'];
            $time_slot_start = $_POST['time_slot_start'];
            $time_slot_end = $_POST['time_slot_end'];
            $user_id = $_POST['user'];
            $computer_id = $_POST['computer'];
            if (!empty($date) && !empty($time_slot_start) && !empty($time_slot_end) && isset($user_id) && isset($computer_id)) {
                $date = htmlentities($date);
                $time_slot_start = htmlentities($time_slot_start);
                $time_slot_end = htmlentities($time_slot_end);
                $user_id = $this->clean($user_id);
                $computer_id = $this->clean($computer_id);
                try {
                    $attributionModel->addAttribution($date, $time_slot_start, $time_slot_end, $user_id, $computer_id);
                    header('Location:/');
                    throw new \Exception('Echec enregistrement');
                } catch (\Exception $e) {
                    echo "Message reçu : ", $e->getMessage();
                }
            } else {
                echo "<script>alert('Veuillez remplir tous les champs')</script>";
            }
        }
        $this->render('form/attributionForm', ['users' => $users, 'computers' => $computers]);
    }
}
