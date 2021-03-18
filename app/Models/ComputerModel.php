<?php

namespace App\Models;

require_once('./app/Models/Model.php');

use App\Models\Model;

class ComputerModel extends Model
{
    public function register($brand, $username, $status)
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
    {
        $query = $this->pdo->query("SELECT * FROM `computer`");
        $computers = $query->fetchAll(\PDO::FETCH_ASSOC);
        return $computers;
    }

    public function getComputer($id)
    {
        $query = $this->pdo->query("SELECT * FROM computer WHERE id=$id");
        $computer = $query->fetch(\PDO::FETCH_OBJ);
        return $computer;
    }

    public function updateComputer($id, $brand, $username, $status)
    {
        $req_up = $this->pdo->prepare("UPDATE computer SET brand= :brand, username= :username, status= :status WHERE id=$id");
        $req_up->execute([
            'brand' => $brand,
            'username' => $username,
            'status' => $status
        ]);
    }

    public function deleteComputer($id)
    {
        $req_delete = "DELETE FROM computer WHERE id=$id";
        $this->pdo->exec($req_delete);
    }
}
