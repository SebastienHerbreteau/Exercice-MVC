<?php

namespace App\Controllers;


class HomeController extends Controller
{
    public function showHome()
    {
        return $this->render("home.twig");
        
    }
}
