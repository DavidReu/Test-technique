<?php

namespace App\Models;

require_once('./app/Models/PdoModel.php');

use App\Models\PdoModel;

class Model
{
    protected $pdo;

    public function __construct()
    /* méthode de construction du Model qui va permettre ensuite d'effectuer toutes les opérations sur la BDD */
    {
        $pdoModel = new PdoModel();
        $pdo = $pdoModel->getPDO();
        $this->pdo = $pdo;
    }
}
