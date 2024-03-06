<?php

namespace Http\Controller\BackEnd;

class HomeController
{

  public  function index()
    {
    view('BackEnd/Home/home.view.php');
    }
}