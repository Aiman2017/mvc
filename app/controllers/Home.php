<?php

class Home extends Controller
{
    public function index()
    {
        $model = new Model();
        $arr['name'] = 'Ahmed';
        $model->delete(2);
        $data['title'] = 'HOME';
        $this->view('home',$data);
    }
}