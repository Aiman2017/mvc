<?php

class Products extends Controller
{
    public function index()
    {
        $data['product'] = 'product';
        $this->view('product', $data);
    }
}
