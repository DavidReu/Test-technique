<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start();
if (!isset($_SESSION['admin'])) {
    $_SESSION['admin'] = false;
}
$uri = $_SERVER['REQUEST_URI'];

require_once('./app/Controllers/Controller.php');
require_once('./app/Controllers/UserController.php');
require_once('./app/Controllers/ComputerController.php');

use app\Controllers\Controller;
use app\Controllers\Usercontroller;
use app\Controllers\ComputerController;

$i = $_GET['id'];

$maincontroller = new Controller();
$map = [
    '/' => ['controller' => Controller::class, 'method' => 'home'],
    '/connexion' => ['controller' => UserController::class, 'method' => 'login'],
    '/deconnexion' => ['controller' => UserController::class, 'method' => 'logout'],
    '/utilisateur' => ['controller' => UserController::class, 'method' => 'userMain'],
    '/utilisateur/inscription' => ['controller' => UserController::class, 'method' => 'registUser'],
    '/ordinateur' => ['controller' => ComputerController::class, 'method' => 'computerMain'],
    '/ordinateur/enregistrer' => ['controller' => ComputerController::class, 'method' => 'registComputer'],
    '/utilisateur/liste' => ['controller' => UserController::class, 'method' => 'showUsers'],
    '/ordinateur/liste' => ['controller' => ComputerController::class, 'method' => 'showComputers'],
    '/utilisateur/modifier?id=' . $i => ['controller' => UserController::class, 'method' => 'updateUser'],
    '/ordinateur/modifier?id=' . $i => ['controller' => ComputerController::class, 'method' => 'updateComputer'],
    '/utilisateur/supprimer?id=' . $i => ['controller' => UserController::class, 'method' => 'deleteUser'],
    '/ordinateur/supprimer?id=' . $i => ['controller' => ComputerController::class, 'method' => 'deleteComputer']
];

if (isset($map[$uri])) {
    $controller = new $map[$uri]['controller']();
    $method = $map[$uri]['method'];
    $controller->$method();
}
