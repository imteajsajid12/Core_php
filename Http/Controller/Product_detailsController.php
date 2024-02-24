<?php

namespace Http\Controller;

use Core\Database;

class Product_detailsController
{
    public function index()
    {

        $db = new Database();
        $data = $db->find('shops', $_GET['id']);
//        return $data;
        return view('Frontend/product_details.php ', ['data' => $data]);
    }
}