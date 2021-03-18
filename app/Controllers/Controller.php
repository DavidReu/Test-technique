<?php

namespace App\Controllers;

class Controller
{
    public function render($view, $data = [])
    {
        ob_start();
        extract($data);
        include('./views/' . $view . '.php');
        $content = ob_get_clean();
        include('./views/template.php');
        return $content;
    }

    public function home()
    {
        $this->render('home');
    }

    public function clean($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlentities($data);
        return $data;
    }
}
