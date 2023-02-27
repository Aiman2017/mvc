<?php

class Home
{
    use Controller, Model;
    public function index()
    {
        $arr['name'] = 'Aiman';
        $arr['family'] = 'Al-Raidii';
        $this->insert($arr);

        show($this->findAll());
            foreach ($this->findAll() as  $key => $value) {
                if ($value['name'] === $arr['name'] && $value['family'] === $arr['family'] ) {
                   echo 'this user is in our database';
                }
        }

        $data['title'] = 'MVC';
        $this->view('home', $data);
    }

}
