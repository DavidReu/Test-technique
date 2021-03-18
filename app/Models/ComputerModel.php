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
}
