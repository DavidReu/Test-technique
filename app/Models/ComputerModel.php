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
        $req = $this->pdo->prepare("SELECT * FROM `computer`");
        $req->execute();
        $computers = $req->fetchAll(\PDO::FETCH_ASSOC);
        return $computers;
    }

    public function getComputer($id)
    {
        $req = $this->pdo->prepare("SELECT * FROM computer WHERE id=$id");
        $req->execute();
        $computer = $req->fetch(\PDO::FETCH_OBJ);
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
