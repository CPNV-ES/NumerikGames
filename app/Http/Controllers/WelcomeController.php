<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    /**
     * Display homepage
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('welcome.index');
    }
}
