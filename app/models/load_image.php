<?php

class Load_image
{
    public function get_images($search = '')
    {
        $DB = new Database();

        $limit = 12;
        $page_number = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $page_number = $page_number < 1 ? 1 : $page_number;

        $offset = ($page_number - 1) * $limit;

        if($search == '')
        {
            $query = "SELECT * FROM images ORDER BY image_id DESC LIMIT $limit OFFSET $offset";
            return $DB->read($query);
        } else {
            $search = esc($search); 
            $query = "SELECT * FROM images WHERE image_title LIKE '%$search%' ORDER BY image_id DESC LIMIT $limit OFFSET $offset";
            return $DB->read($query);
        }
    }

    public function get_all_images()
    {
        $DB = new Database();

        $query = "SELECT * FROM images";
        return count($DB->read($query));

    }

    public function get_single_image($image_id)
    {
        $DB = new Database();

        $arr['image_id'] = $image_id;
        $query = "UPDATE images SET views = (views + 1) WHERE image_id = :image_id LIMIT 1";
        $data = $DB->read($query, $arr);
        
        $query = "SELECT * FROM images WHERE image_id = :image_id LIMIT 1";
        $data = $DB->read($query, $arr);

        return $data[0];

    }

}
