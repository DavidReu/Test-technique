<?php
error_reporting(0);

session_start();
if (!isset($_SESSION['admin'])) {
    $_SESSION['admin'] = false;
}
$uri = $_SERVER['REQUEST_URI'];

require_once('./app/Controllers/Controller.php');
require_once('./app/Controllers/UserController.php');
require_once('./app/Controllers/ComputerController.php');
require_once('./app/Controllers/AttributionController.php');

use app\Controllers\Usercontroller;
use app\Controllers\ComputerController;
use App\Controllers\AttributionController;

$i = $_GET['id'];
$d = $_GET['date'];

$map = [
    '/' => ['controller' => UserController::class, 'method' => 'login'],
    '/accueil' => ['controller' => AttributionController::class, 'method' => 'home'],
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
    '/ordinateur/supprimer?id=' . $i => ['controller' => ComputerController::class, 'method' => 'deleteComputer'],
    '/attributions' => ['controller' => AttributionController::class, 'method' => 'attributionMain'],
    '/attribution/ajouter' => ['controller' => AttributionController::class, 'method' => 'addAttribution'],
    '/attribution/liste' => ['controller' => AttributionController::class, 'method' => 'listAttributions'],
    '/attribution/liste?date=' . $d => ['controller' => AttributionController::class, 'method' => 'listAttributions'],
    '/attribution/supprimer?id=' . $i => ['controller' => AttributionController::class, 'method' => 'deleteAttribution'],
];

if (isset($map[$uri])) {
    $controller = new $map[$uri]['controller']();
    $method = $map[$uri]['method'];
    $controller->$method();
}
