<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        $blogs = Blog::with("blogcategory")->get();
        return view('user.home', ['blogs' => $blogs]);
    }

    public function about()
    {
        return view("user.about");
    }

    public function blog()
    {
        $blogs = Blog::with("blogcategory")->get();
        return view('user.blog', ['blogs' => $blogs]);
    }

    public function contact()
    {
        return view("user.contact");
    }

    public function portfolio()
    {
        return view("user.portfolio");
    }
    public function adminDashboard()
    {
        return view("admin.dashboard");
    }
}
