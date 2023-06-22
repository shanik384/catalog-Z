<?php

Class Upload extends Controller
{
    public function index()
    {
        // $data['page_title']= "Upload ";
        // $this->view("catalog/home",$data);
    }

    public function image()
    {
        $data['page_title']= "Upload Image";

        $user = $this->loadModel("user");
        //Check if logged in
        if(!$result = $user->is_logged_in())
        {
            header("Location:" . ROOT . "login");
            die;
        }

        if(isset($_FILES['file']))
        {
            
            $model = $this->loadModel("Upload_file");
            $model->upload($_POST,$_FILES);
        }
        $this->view("catalog/upload_image",$data);
    }

    public function video()
    {
        $data['page_title']= "Upload Video";
        $this->view("catalog/upload_video",$data);
    }
    
}