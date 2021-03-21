<?php

namespace App\Models;

require_once('./app/Models/Model.php');

use App\Models\Model;
use Exception;

class AttributionModel extends Model
{
    public function addAttribution($date, $time_slot_start, $time_slot_end, $user_id, $computer_id)
    /* méthode permettrant d'enregistrer une attribution dans la BDD */
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
    /* méthode permettrant de récupérer certaines informations venant de la table Attributions, Users et Computers */
    {
        $req = $this->pdo->prepare("SELECT a.id, a.date, a.time_slot_start, a.time_slot_end, u.name, u.first_name, c.username FROM attributions AS a INNER JOIN users AS u ON a.user_id = u.id INNER JOIN computer AS c ON a.computer_id = c.id");
        $req->execute();
        $events = $req->fetchAll(\PDO::FETCH_ASSOC);
        return $events;
    }

    public function getAllAttributions()
    /* méthode permettrant de récupérer toutes les informations des attributions dans la BDD*/
    {
        $req = $this->pdo->prepare("SELECT * FROM attributions");
        $req->execute();
        $attributions = $req->fetchAll(\PDO::FETCH_ASSOC);
        return $attributions;
    }

    public function getAttributionsByDay($date)
    /* méthode permettrant les mêmes informations que la méthode showEvents mais cette fois d'une seule ligne en fonction de la date */
    {
        $req = $this->pdo->prepare("SELECT a.id, a.date, a.time_slot_start, a.time_slot_end, u.name, u.first_name, c.username FROM attributions AS a INNER JOIN users AS u ON a.user_id = u.id INNER JOIN computer AS c ON a.computer_id = c.id WHERE a.date=$date");
        $req->execute();
        $attributionsByDay = $req->fetchAll(\PDO::FETCH_ASSOC);
        return $attributionsByDay;
    }

    public function deleteAttribution($id)
    /* méthode permettrant de supprimer les informations d'une attribution selon son id*/
    {
        $req_delete = "DELETE FROM attributions WHERE id=$id";
        $this->pdo->exec($req_delete);
    }

    public function checkAttribution($date, $time_slot_start, $time_slot_end, $computer_id)
    /* méthode permettrant de chercher dans la table attribution si il y a déjà une ligne correspondant avec toutes les informations qu'on lui donne */
    {
        $req = $this->pdo->prepare("SELECT * FROM `attributions`WHERE (date=$date) AND (time_slot_start=$time_slot_start) AND (time_slot_end=$time_slot_end) AND (computer_id=$computer_id)");
        $req->execute();
        $attribution = $req->fetch();
        var_dump($attribution);
        if (!empty($attribution)) {
            return true;
        } else {
            return false;
        }
    }
}
