<?php

namespace App\Http\Controllers;

class IndexController extends Controller
{
    public function __invoke(): \Illuminate\View\View
    {
        return view('welcome');
    }
}
