<?php

namespace App\Models;

require_once('./app/Models/Model.php');

use App\Models\Model;

class UserModel extends Model
{
    public function register($name, $firstname, $mail)
    {
        try {
            $requete = $this->pdo->prepare('INSERT INTO `users`(`name`, `first_name`, `mail`) VALUES (:name, :first_name, :mail)');
            $requete->execute(array(
                'name' => $name,
                'first_name' => $firstname,
                'mail' => $mail
            ));
        } catch (\Exception $e) {
            echo "échec de l'enregistrement", $e->getMessage();
        }
    }

    public function getUsers(): array
    {
        $query = $this->pdo->query("SELECT * FROM `users`");
        $users = $query->fetchAll(\PDO::FETCH_ASSOC);
        return $users;
    }
}
