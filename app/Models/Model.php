<?php

namespace App\Models;

require_once('./app/Models/PdoModel.php');

use App\Models\PdoModel;

class Model
{
    protected $pdo;

    public function __construct()
    {
        $pdoModel = new PdoModel();
        $pdo = $pdoModel->getPDO();
        $this->pdo = $pdo;
    }
}
