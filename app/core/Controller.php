<?php

class Controller
{

    public function view($view, $data = [])
    {
        extract($data);
        $fileName = '../app/views/' . $view . '.view.php';
        if (file_exists($fileName)) {
            require_once $fileName;
        }else {
            if (DEBUG) {
                echo '<h1>we cant found the file of view name ' . $view . '</h1>';
            }
        }
    }
}