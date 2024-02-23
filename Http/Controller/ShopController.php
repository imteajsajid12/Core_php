<?php

namespace Http\Controller;

use Core\Database;

class ShopController
{
public function index(){
    $db = new Database();
    $data = $db->query('SELECT * FROM shops')->all();
        view('Frontend/Shop.view.php',[
            "Shop" => $data,
            'Delete' => \Core\Session::get('Delete'),
            'Success' => \Core\Session::get('Success'),
        ]);
    }


}