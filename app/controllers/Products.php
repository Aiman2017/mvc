<?php

class Products
{
    use Controller;
    public function index()
    {
        $data['product'] = 'Product';
        $this->view('product', $data);
    }
}