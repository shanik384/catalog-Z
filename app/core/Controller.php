<?php

Class Controller
{
    public function view($view, $data = [])
    {
        if(file_exists("../app/views/" . $view . ".views.php"))
        {
            include "../app/views/" . $view . ".views.php";

        }
    }

    public function loadModel($model)
    {
        if(file_exists("../app/models/" . strtolower($model) . ".php"))
        {
            include "../app/models/" . strtolower($model) . ".php";
            return $model = new $model();

        }
    }
}