<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

$_SESSION['admin'] = false;
$uri = $_SERVER['REQUEST_URI'];

var_dump($_SESSION['admin']);
require_once('./app/Controllers/Controller.php');
require_once('./app/Controllers/UserController.php');

use app\Controllers\Controller;
use app\Controllers\Usercontroller;

$maincontroller = new Controller();
$map = [
    '/' => ['controller' => Controller::class, 'method' => 'home'],
    '/connexion' => ['controller' => UserController::class, 'method' => 'login']
];

if (isset($map[$uri])) {
    $controller = new $map[$uri]['controller']();
    $method = $map[$uri]['method'];
    $controller->$method();
}
