<?php

namespace App\Controllers;

class Home extends BaseController
{

    function __construct()
    {
        session()->set('active-page', 'home');
    }

    public function index(): string
    {
        return view('pages/HomeView');
    }
}
