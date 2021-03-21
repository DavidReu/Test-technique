<?php

namespace App\Controllers;

class Controller
{
    public function render($view, $data = [])
    /* 
    La méthode render récupère les données qu'on lui donne ainsi que la vue pour faire la liaison entre les 2
    et permettre d'utiliser les données sur la vue et ensuite envoie le tout vers le template ce qui peut afficher le contenu
    à l'endroit où est placé la variable $content dans le template. 
    */
    {
        ob_start();
        extract($data);
        include('./views/' . $view . '.php');
        $content = ob_get_clean();
        include('./views/template.php');
        return $content;
    }

    public function clean($data)
    /* 
    méthode permettrant de supprimer les espaces et saut de ligne avant et après la donnée avec trim
    ensuite de supprimer les anti slashes, qui permettent d'échapper un caratère, avec stripslashes
    et pour finir elle convertit les caratères spéciaux pour éviter que les chevrons < > soient interprété comme du code et donc
    protéger contre les failles XSS et l'injection de code dans les champs des formulaires.
    */
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlentities($data);
        return $data;
    }

    public function authorization()
    /* 
    méthode permettrant de vérifier l'autorisation si l'admin est bien connecté alors elle renvoie vrai 
    et le reste du code s'éffectue normalement mais si l'admin n'est pas connecté elle affiche la page 
    indiquant que l'utilisateur n'a pas accès à l'url demandé
    */
    {
        if ($_SESSION['admin'] == true) {
            return true;
        } else {
            include('./views/auth/noAuthorization.php');
            die();
        }
    }
}
