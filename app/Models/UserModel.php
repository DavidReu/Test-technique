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

    public function getUser($id)
    {
        $query = $this->pdo->query("SELECT * FROM users WHERE id=$id");
        $user = $query->fetch(\PDO::FETCH_OBJ);
        return $user;
    }

    public function updateUser($id, $name, $firstname, $mail)
    {
        $req_up = $this->pdo->prepare("UPDATE users SET name= :name, first_name= :first_name, mail= :mail WHERE id=$id");
        $req_up->execute([
            'name' => $name,
            'first_name' => $firstname,
            'mail' => $mail
        ]);
    }

    public function deleteUser($id)
    {
        $req_delete = "DELETE FROM users WHERE id=$id";
        $this->pdo->exec($req_delete);
    }
}
