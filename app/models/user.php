<?php

Class user
{
    public function signup($POST)
    {
        $DB = new Database();
        $_SESSION['error'] = '';

        if($_SESSION['error'] == '')
        {
            $arr['email'] = esc($POST['email']);
            $arr['password'] = esc($POST['password']);
            $arr['full_name'] = $POST['full_name'];
            $arr['image'] = '';
            $arr['date'] = date("Y-m-d H:i:s");
            $arr['url_address'] = get_random_string_max(60);
    
            $query = "INSERT INTO users (email,password,full_name,image,date,url_address) VALUES (:email,:password,:full_name,:image,:date,:url_address)";
    
            $data = $DB->write($query, $arr);

            if($data)
            {
                header("Location:" . ROOT . "login");
                die;
            }  
        }
    }

    public function login($POST)
    {
        $DB = new Database();
        $_SESSION['error'] = '';

        if($_SESSION['error'] == '')
        {
            $arr['email'] = esc($POST['email']);
            $arr['password'] = esc($POST['password']);

            $query = "SELECT * FROM users WHERE email = :email && password = :password LIMIT 1";

            $data = $DB->read($query, $arr);

            if(is_array($data))
            {
                $data = $data[0];
                $_SESSION['user_url'] = $data->url_address;
                $_SESSION['user_name'] = $data->full_name;
                header("Location:" . ROOT . "home");
                die;
            } 
        }
    }

    public function get_single_user($image_id)
    {
        $DB = new Database();

        $arr['image_id'] = $image_id;
        $query = "UPDATE images SET views = (views + 1) WHERE image_id = :image_id LIMIT 1";
        $data = $DB->read($query, $arr);
        
        $query = "SELECT * FROM images WHERE image_id = :image_id LIMIT 1";
        $data = $DB->read($query, $arr);

        return $data[0];

    }

    public function is_logged_in()
    {

        if(isset($_SESSION['user_url']) && isset($_SESSION['user_name']))
        {
            return true;
        }

        return false;

    }

}