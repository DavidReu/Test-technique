<?php

namespace App\Models;

require_once('./app/Models/Model.php');

use App\Models\Model;
use Exception;

class AttributionModel extends Model
{
    public function addAttribution($date, $time_slot_start, $time_slot_end, $user_id, $computer_id)
    {
        try {
            $requete = $this->pdo->prepare('INSERT INTO `attributions`(`date`, `time_slot_start`, `time_slot_end`, `user_id`, `computer_id`) VALUES (:date, :time_slot_start, :time_slot_end, :user_id, :computer_id)');
            $requete->execute(array(
                'date' => $date,
                'time_slot_start' => $time_slot_start,
                'time_slot_end' => $time_slot_end,
                'user_id' => $user_id,
                'computer_id' => $computer_id
            ));
            throw new \Exception('Echec enregistrement');
        } catch (\Exception $e) {
            echo "Message reçu : ", $e->getMessage();
        }
    }

    public function showEvents()
    {
        $query = $this->pdo->query("SELECT a.id, a.date, a.time_slot_start, a.time_slot_end, u.name, u.first_name, c.username FROM attributions AS a INNER JOIN users AS u ON a.user_id = u.id INNER JOIN computer AS c ON a.computer_id = c.id");
        $events = $query->fetchAll(\PDO::FETCH_ASSOC);
        return $events;
    }

    public function getAllAttributions()
    {
        $query = $this->pdo->query("SELECT * FROM attributions");
        $attributions = $query->fetchAll(\PDO::FETCH_ASSOC);
        return $attributions;
    }

    public function getAttributionsByDay($date)
    {
        $query = $this->pdo->query("SELECT a.id, a.date, a.time_slot_start, a.time_slot_end, u.name, u.first_name, c.username FROM attributions AS a INNER JOIN users AS u ON a.user_id = u.id INNER JOIN computer AS c ON a.computer_id = c.id WHERE a.date=$date");
        $attributionsByDay = $query->fetchAll(\PDO::FETCH_ASSOC);
        return $attributionsByDay;
    }

    public function deleteAttribution($id)
    {
        $req_delete = "DELETE FROM attributions WHERE id=$id";
        $this->pdo->exec($req_delete);
    }

    public function checkAttribution($date, $time_slot_start, $time_slot_end, $computer_id)
    {
        $query = $this->pdo->query("SELECT * FROM `attributions`WHERE (date=$date) AND (time_slot_start=$time_slot_start) AND (time_slot_end=$time_slot_end) AND (computer_id=$computer_id)");
        $attribution = $query->fetch();
        var_dump($attribution);
        if (!empty($attribution)) {
            return true;
        } else {
            return false;
        }
    }
}
