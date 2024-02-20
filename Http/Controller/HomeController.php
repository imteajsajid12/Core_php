<?php

namespace Http\Controller;

use Core\Database;

class HomeController
{
  public function index()
  {
      $data =new Database();
      $data =  $data->query('SELECT * FROM homepages')->get();
      view('Frontend/home.view.php',[
          'Errors' => "",
          'Homepages'=>$data
      ]);
  }
}