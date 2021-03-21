<?php

namespace App\Models;

require_once('./app/Models/Model.php');

use App\Models\Model;

class UserModel extends Model
{
    public function register($name, $firstname, $mail)
    /* méthode permettant de faire l'enregistrement d'un utilisateur dans la BDD */
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
    /* méthode permettrant de récupérer tous les utilisateurs */
    {
        $req = $this->pdo->prepare("SELECT * FROM `users`");
        $req->execute();
        $users = $req->fetchAll(\PDO::FETCH_ASSOC);
        return $users;
    }

    public function getUser($id)
    /* méthode permettrant de récupérer un utilisateur selon son id*/
    {
        $req = $this->pdo->prepare("SELECT * FROM users WHERE id=$id");
        $req->execute();
        $user = $req->fetch(\PDO::FETCH_OBJ);
        return $user;
    }

    public function updateUser($id, $name, $firstname, $mail)
    /* méthode permettrant de modifier les informations d'un utilisateur après les avoir récupérer depuis un formulaire*/
    {
        $req_up = $this->pdo->prepare("UPDATE users SET name= :name, first_name= :first_name, mail= :mail WHERE id=$id");
        $req_up->execute([
            'name' => $name,
            'first_name' => $firstname,
            'mail' => $mail
        ]);
    }

    public function deleteUser($id)
    /* méthode permettrant de supprimer un utilisateur en utilisant son id*/
    {
        $req_delete = "DELETE FROM users WHERE id=$id";
        $this->pdo->exec($req_delete);
    }
}
