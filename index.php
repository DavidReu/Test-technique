<?php
error_reporting(0);

/* 
Lancement d'une session pour avoir accès aux fonctionnalités en tant qu'administrateur.
Pour améliorer cette aspect à terme il faudrait enlever le système de session et remplacer par
une class administrateur qui va gérer la connexion/déconnexion ainsi que les autorisations.
*/
/*---------- Session ----------*/
session_start();
if (!isset($_SESSION['admin'])) {
    $_SESSION['admin'] = false;
}
/*---------- Fin Session ----------*/

$uri = $_SERVER['REQUEST_URI']; //Récupération de l'url pour le routeur

/*---------- Tous les require ----------*/
require_once('./app/Controllers/Controller.php');
require_once('./app/Controllers/UserController.php');
require_once('./app/Controllers/ComputerController.php');
require_once('./app/Controllers/AttributionController.php');
/*---------- Fin require ----------*/

/*---------- Appel des namespaces ----------*/

use app\Controllers\Usercontroller;
use app\Controllers\ComputerController;
use App\Controllers\AttributionController;
/*---------- Fin namespaces ----------*/

/* 
Ces deux variables sont temporaires également. Le but à long terme étant de faire comme sous Symfony 
des urls dynamique avec les request/response
*/

$i = $_GET['id'];
$d = $_GET['date'];


/* 
Pour le rooter on utilise le tableau ci après qui contient l'url -> le controller qui doit être appelé 
pour cette url et enfin la méthode à utiliser
*/
/*---------- Map rooter ----------*/
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
/*---------- Fin map rooter ----------*/

/* 
La fonction récupère l'url actuelle grâce à la variable définie un peu plus tôt 
elle compare l'url avec toutes celles présentes dans le tableau si l'une d'entre elle correspond bien
le controller et la méthode lié à cette url sont appelés
*/
/*---------- Fonction pour le rooter ----------*/
if (isset($map[$uri])) {
    $controller = new $map[$uri]['controller']();
    $method = $map[$uri]['method'];
    $controller->$method();
}
/*---------- Fin fonction rooter ----------*/