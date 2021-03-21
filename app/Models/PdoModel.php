<?php

namespace App\Models;

class PdoModel
{
    private $dbName;
    private $server;
    private $user;
    private $pass;

    public function __construct($dbName = 'heroku_66bd661aef1662e', $serverName = 'eu-cdbr-west-03.cleardb.net', $userName = 'b31240cd8ab8cf', $password = 'ba09f8aa')
    /* méthode permettrant de construire le pdo ici avec comme valeur par défaut les informations de connexion à la BDD en ligne */
    {
        $this->dbName = $dbName;
        $this->server = $serverName;
        $this->user = $userName;
        $this->pass = $password;
    }

    public function Connexion()
    /* méthode de test mais qui n'est plus utilisé */
    {
        try {
            echo 'Connexion réussie';
        } catch (\PDOException $e) {
            echo "Echec de la connexion" . $e->getMessage();
        };
    }

    public function getPDO()
    /* méthode de connexion au serveur qui utilise les informations qu'on a passé précédemment au constructeur */
    {
        try {
            $pdo = new \PDO('mysql:host=' . $this->server . ';dbname=' . $this->dbName . ';charset=utf8', $this->user, $this->pass);
            $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }
}
