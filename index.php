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

use app\Controllers\Controller;
use app\Controllers\Usercontroller;

$maincontroller = new Controller();
$map = [
    '/' => ['controller' => Controller::class, 'method' => 'home'],
    '/connexion' => ['controller' => UserController::class, 'method' => 'login'],
    '/deconnexion' => ['controller' => UserController::class, 'method' => 'logout']
];

if (isset($map[$uri])) {
    $controller = new $map[$uri]['controller']();
    $method = $map[$uri]['method'];
    $controller->$method();
}
