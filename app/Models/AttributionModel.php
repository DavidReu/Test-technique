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
}
