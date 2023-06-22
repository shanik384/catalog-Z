<?php


Class Home extends Controller
{
    
    public function index()
    {
        $data['page_title']= "Photos";
        
        //Pagination
        $pagination = $this->loadModel("pagination");
        $data['page_prev'] = $pagination->generate_link($pagination->current_page_number() - 1);
        $data['page_next'] = $pagination->generate_link($pagination->current_page_number() + 1);
        $data['page_1'] = $pagination->generate_link(1);
        $data['page_2'] = $pagination->generate_link($pagination->current_page_number() + 1);
        $data['page_3'] = $pagination->generate_link($pagination->current_page_number() + 2);
        $data['page_4'] = $pagination->generate_link($pagination->current_page_number() + 3);
        $data['page_current'] = $pagination->current_page_number();
        
        $load_image = $this->loadModel("load_image");
        $data['page_total'] = $load_image->get_all_images();

        $search = isset($_GET['search']) ? $_GET['search'] : '';
        $data['images'] = $load_image->get_images($search);
        
        $load_image_class = $this->loadModel("image_class");

        if(is_array($data['images']))
        {
            foreach ($data['images'] as $key => $row) {
                $data['images'][$key]->image = $load_image_class->get_thumbnail($row->image);
            }
        } 

        $this->view("catalog/home",$data);
    }
    
}