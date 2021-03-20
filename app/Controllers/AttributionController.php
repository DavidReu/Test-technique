<?php

namespace App\Controllers;

require_once('./app/Models/AttributionModel.php');
require_once('./app/Models/ComputerModel.php');
require_once('./app/Models/UserModel.php');

use App\Controllers\Controller;
use App\Models\AttributionModel;
use App\Models\ComputerModel;
use App\Models\UserModel;
use DateTime;

class AttributionController extends Controller
{
    public function home()
    {
        $attributionModel = new AttributionModel();
        $attributions = $attributionModel->showEvents();
        /* echo '<pre>';
        print_r($attributions);
        echo '</pre>'; */
        $events = [];
        foreach ($attributions as $key => $valeur) {
            $oneEvent = [
                'title' => $valeur['name'] . ' ' . $valeur['first_name'] . ' ' . $valeur['username'],
                'start' => $valeur['date'] . 'T' . $valeur['time_slot_start'],
                'end' => $valeur['date'] . 'T' . $valeur['time_slot_end']
            ];
            array_push($events, $oneEvent);
        }
        $events = json_encode($events);
        /* echo '<pre>';
        print_r($events);
        echo '</pre>'; */
        $this->render('home', ['events' => $events]);
    }

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
                date_default_timezone_set('Indian/Reunion');
                $today = date('Y-m-d');
                $exist = $attributionModel->checkAttribution("'$date'", "'$time_slot_start'", "'$time_slot_end'", "'$computer_id'");
                if ($date >= $today && $time_slot_start >= "08:00" && $time_slot_start < "17:00" && $time_slot_end > $time_slot_start && $time_slot_end <= "17:00" && $exist == false) {
                    try {
                        $attributionModel->addAttribution($date, $time_slot_start, $time_slot_end, $user_id, $computer_id);
                        header('Location:/attribution/liste');
                        throw new \Exception('Echec enregistrement');
                    } catch (\Exception $e) {
                        echo "Message reçu : ", $e->getMessage();
                    }
                } else {
                    echo "<script>alert('Date/Heure incorrectes ou créneau horaire déjà pris sur cette ordinateur')</script>";
                }
            } else {
                echo "<script>alert('Veuillez remplir tous les champs')</script>";
            }
        }
        $this->render('form/attributionForm', ['users' => $users, 'computers' => $computers]);
    }

    public function attributionMain()
    {
        $this->render('attributions/mainAttribution');
    }

    public function listAttributions()
    {
        $attributionModel = new AttributionModel();
        $attributions = $attributionModel->getAllAttributions();
        if (isset($_GET['date'])) {
            $day = $_GET['date'];
            $date = "'$day'";
            $attributionsByDay = $attributionModel->getAttributionsByDay($date);
        } else {
            $attributionsByDay = $attributionModel->showEvents();
        }
        $this->render('attributions/listAttributions', ['attributions' => $attributions, 'attributionsByDay' => $attributionsByDay]);
    }

    public function deleteAttribution()
    {
        $attributionModel = new AttributionModel();
        $id = $_GET['id'];
        if (isset($id)) {
            $attributionModel->deleteAttribution($id);
            header('Location:/attribution/liste');
        }
    }
}
