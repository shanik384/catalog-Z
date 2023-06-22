<?php

Class Upload_file
{
    public function upload($POST,$FILES)
    {
        $DB = new Database();

        $_SEESION['error'] = "";

        $allowed[] = 'image/jpeg';
        $allowed[] = 'video/mp4';
        // Upload the file
        if (isset($POST['title']) && isset($FILES['file'])) 
        {
            // show($POST);
            // show($FILES);
            // die;
            
            if($FILES['file']['name'] != "" && $FILES['file']['error'] == 0 && in_array($FILES['file']['type'], $allowed))
            {
                $folder = "uploads/";
                if(!file_exists($folder))
                {
                    mkdir($folder,0777,true);
                }

                $destination = $folder . $FILES['file']['name'];

                move_uploaded_file($FILES['file']['tmp_name'], $destination);

            } else {
                $_SEESION['error'] = "Only JPEG is allowed";
            }
        

            if($_SEESION['error'] == "")
            {
                $arr['image_title'] = esc($POST['title']);
                $arr['date'] = date("Y-m-d H:i:s");
                $arr['user_url'] = $_SESSION['user_url'];
                $arr['image'] = $destination;
                $arr['views'] = 0;
                $arr['url_address'] = get_random_string_max(60);
                
                $query = "INSERT INTO images (image_title,user_url,date,image,views,url_address) VALUES (:image_title,:user_url,:date,:image,:views,:url_address)";

                $data = $DB->write($query, $arr);
                
                if($data)
                {
                    header("Location:" . ROOT . "home");
                    die;
                }  
            }
        }

    }
}