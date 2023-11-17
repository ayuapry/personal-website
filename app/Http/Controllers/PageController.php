<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Portfolio;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        $portfolios = Portfolio::with("portocategory")->get();
        $blogs = Blog::with("blogcategory")->get();
        return view('user.home', ['blogs' => $blogs, 'portfolios' => $portfolios]);
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
        $portfolios = Portfolio::with("portocategory")->get();
        return view("user.portfolio", ["portfolios" => $portfolios]);
    }
    public function adminDashboard()
    {
        return view("admin.dashboard");
    }
}
