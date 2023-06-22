<?php

Class Database
{
    public function db_connect()
    {

        try{
            
            $dsn = "mysql:host=localhost;dbname=catalog;";
            return $db = new PDO($dsn,"root","12345");

        } catch(PDOException $e)
        {
            die($e->getMessage());
        }
    }

    public function read($query, $data = [])
    {
        $DB = $this->db_connect();
        $stmt = $DB->prepare($query);

        if(count($data) == 0)
        {
            $stmt = $DB->query($query);
            $check = 0;
            if($stmt) {
                $check = 1;
            }
        } else {
            $check = $stmt->execute($data);
        }
        
        if($check)
        {
            $data = $stmt->fetchAll(PDO::FETCH_OBJ);
            if(isset($data) && count($data) > 0)
            {
                return $data;
            }
            return false;
        } else {
            return false;
        }

    }

    public function write($query, $data = [])
    {

        $DB = $this->db_connect();
        $stmt = $DB->prepare($query);

        if(count($data) == 0)
        {
            $stmt = $DB->query($query);
            $check = 0;
            if($stmt) {
                $check = 1;
            }
        } else {
            $check = $stmt->execute($data);
        }
        
        if($check)
        {
            return true;
        } else {
            return false;
        }
    }
}