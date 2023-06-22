<?php

Class Logout extends Controller
{
    public function index()
    {
        $data['page_title'] = "Logout";

        if(isset($_SESSION['user_url']))
        {
            unset($_SESSION['user_url']);
        }

        if(isset($_SESSION['user_name']))
        {
            unset($_SESSION['user_name']);
        }

        header("Location:" . ROOT . "home");
    }
}