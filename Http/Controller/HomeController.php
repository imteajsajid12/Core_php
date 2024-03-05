<?php

namespace Http\Controller;

use Core\Database;

class HomeController
{
  public function index()
  {
      $data =new Database();
      $product = $data->query('SELECT * FROM shops LIMIT 20 OFFSET 0')->all();
      $data =  $data->query('SELECT * FROM homepages')->get();
      view('Frontend/home.view.php',[
          'Errors' => "",
          'Homepages'=>$data,
          'products'=>$product
      ]);
  }
}