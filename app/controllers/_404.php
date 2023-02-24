<?php

class _404 extends Controller
{

    public function index()
    {
        $data['error'] = '404';
        $this->view('404', $data);
    }

}
