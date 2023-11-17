<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\Portfolio;
use App\Models\PortoCategory;
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
    public function blogDetail($id)
    {
        $blog = Blog::with("blogcategory")->findOrFail($id);
        return view('user.blogDetail', ['blog' => $blog]);
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
    public function portfolioDetail($id)
    {
        $portfolio = Portfolio::with("portocategory")->findOrFail($id);
        return view('user.portfolioDetail', ['portfolio' => $portfolio]);
    }
    public function adminDashboard()
    {
        $blogcount = Blog::count();
        $portfoliocount = Portfolio::count();
        $blogcategorycount = BlogCategory::count();
        return view("admin.dashboard", ["blogs" => $blogcount, "portfolios" => $portfoliocount, "blogcategory" => $blogcategorycount]);
    }
}
