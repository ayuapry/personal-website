<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        return view('user.home');
    }

    public function about()
    {
        return view("user.about");
    }
    public function blog()
    {
        return view("user.blog");
    }
    public function adminDashboard()
    {
        return view("admin.dashboard");
    }
}
