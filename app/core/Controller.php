<?php

Trait Controller
{
    public function view($name, $data = [])
    {
        if(!empty($data))
        {
            extract($data);
        }

        $fileName = "../app/views/".$name.".view.php";
        if(!file_exists($fileName)){
            $fileName = "../app/views/404.view.php";
        }
        require $fileName;
    }
}