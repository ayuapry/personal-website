<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::all();
        return view("admin.blog.index", ["blogs" => $blogs]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $blog_categories = BlogCategory::all();
        return view("admin.blog.add", ["blog_categories" => $blog_categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            "image" => "required|image|mimes:jpg,jpeg,png|max:2048",
            "title" => "required|min:5",
            "content" => "required|min:10",
            "blogcategory_id" => "required"
        ]);

        $saveImage['image'] = Storage::putFile('public/image', $request->file('image'));

        Blog::create([
            "image" =>  $saveImage["image"],
            "title" => $validated["title"],
            "content" => $validated["content"],
            "blogcategory_id" => $validated["blogcategory_id"]
        ]);

        return redirect('/admin/blog');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $blog = Blog::with('blogcategory')->findOrFail($id);
        $blog_categories = BlogCategory::all();
        return view('admin.blog.edit', ['blog' => $blog, 'blog_categories' => $blog_categories]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $blog = Blog::findOrFail($id);
        $validated = $request->validate([
            'title' => 'string',
            'content' => 'string',
            'blogcategory_id' => '',
            'image' => 'mimes:jpg,jpeg,png|max:5120'
        ]);

        if ($request->hasFile('image')) {
            Storage::delete($blog->image);
            $newImage = ['image' => Storage::putfile('public/image', $request->file('image'))];
        } else {
            $newImage = ['image' => $blog->image];
        }

        Blog::where('id', $id)->update([
            "title" => $validated["title"],
            "content" => $validated["content"],
            "blogcategory_id" => $validated["blogcategory_id"],
            'image' => $newImage['image']
        ]);

        return redirect('/admin/blog');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Blog::destroy($id);
        return redirect('/admin/blog');
    }
}
