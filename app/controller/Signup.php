<?php

Class signup extends Controller
{
    public function index()
    {
        $data['page_title'] = "Sign Up";

        if(isset($_POST['email']))
        {
            $model = $this->loadModel("user");
            $model->signup($_POST);
        }
    
        $this->view("catalog/signup",$data);
    }
}