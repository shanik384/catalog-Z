<?php

Class Photo_detail extends Controller
{
    public function index()
    {
        $data['page_title']= "Photo Details";

        $load_image = $this->loadModel("load_image");

        $image_id = isset($_GET['image_id']) ? $_GET['image_id'] : '';
        $data['image'] = $load_image->get_single_image($image_id);
        $data['random_images'] = $load_image->get_images();

        $load_image_class = $this->loadModel("image_class");

        if(is_array($data['random_images']))
        {
            foreach ($data['random_images'] as $key => $row) {
                $data['random_images'][$key]->image = $load_image_class->get_thumbnail($row->image);
            }
        } 

        $this->view("catalog/photo_detail",$data);
    }
    
}