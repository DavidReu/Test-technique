<?php

namespace App\Models;

require_once('./app/Models/Model.php');

use App\Models\Model;

class ComputerModel extends Model
{
    public function register($brand, $username, $status)
    /* méthode permettrant d'enregistrer un ordinateur dans la BDD */
    {
        try {
            $requete = $this->pdo->prepare('INSERT INTO `computer`(`brand`, `username`, `status`) VALUES (:brand, :username, :status)');
            $requete->execute(array(
                'brand' => $brand,
                'username' => $username,
                'status' => $status
            ));
        } catch (\Exception $e) {
            echo "échec de l'enregistrement", $e->getMessage();
        }
    }

    public function getComputers(): array
    /* méthode permettrant de récupérer les informations de tous les ordinateurs dans la BDD */
    {
        $req = $this->pdo->prepare("SELECT * FROM `computer`");
        $req->execute();
        $computers = $req->fetchAll(\PDO::FETCH_ASSOC);
        return $computers;
    }

    public function getComputer($id)
    /* méthode permettrant de récupérer les informations d'un ordinateur à partir de son id */
    {
        $req = $this->pdo->prepare("SELECT * FROM computer WHERE id=$id");
        $req->execute();
        $computer = $req->fetch(\PDO::FETCH_OBJ);
        return $computer;
    }

    public function updateComputer($id, $brand, $username, $status)
    /* méthode permettrant de modifier les informations d'un ordinateur dans la BDD après avoir récupérer les données depuis un formulaire */
    {
        $req_up = $this->pdo->prepare("UPDATE computer SET brand= :brand, username= :username, status= :status WHERE id=$id");
        $req_up->execute([
            'brand' => $brand,
            'username' => $username,
            'status' => $status
        ]);
    }

    public function deleteComputer($id)
    /* méthode permettrant de supprimer un ordinateur à partir de son id */
    {
        $req_delete = "DELETE FROM computer WHERE id=$id";
        $this->pdo->exec($req_delete);
    }
}
