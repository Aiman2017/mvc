<?php

class Home
{
    use Controller, Model;
    public function index()
    {
        $arr['name'] = 'Aiman';
        $arr['family'] = 'Al-Raidii';

       if (empty($this->findAll())) {
           $this->insert($arr);
       }else {
           foreach ($this->findAll() as  $key => $value) {
               if ($value['name'] === $arr['name'] && $value['family'] === $arr['family'] ) {
                   return'this user is in our database';

               }else {
                   $this->insert($arr);
                   break;
               }
           }
       }

        $data['title'] = 'MVC';
        $this->view('home', $data);
    }

}
