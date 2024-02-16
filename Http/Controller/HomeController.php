<?php

namespace Http\Controller;

class HomeController
{
  public function index()
  {
      view('Frontend/home.view.php',[
          'Errors' => "",
      ]);
  }
}