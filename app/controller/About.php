<?php

Class About extends Controller
{
    public function index()
    {
        $data['page_title']= "About Us";
        $this->view("catalog/about", $data);
    }
    
}