<?php

namespace App\Http\Controllers;

use App\Models\BlogCategory;
use Illuminate\Http\Request;

class BlogCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogcategories = BlogCategory::all();
        return view("admin.blogCategory.index", ["blogcategories" => $blogcategories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.blogcategory.add");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validasi form
        $validated = $request->validate([
            "name" => "required",
        ]);

        // mebnambahkan ke dalam database
        BlogCategory::create([
            "name" => $validated["name"],
        ]);

        // return
        return redirect('/admin/blogcategory');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $blogcategory = BlogCategory::findOrFail($id);
        return view("admin.blogcategory.edit", ["blogcategory" => $blogcategory]);
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
        $validated = $request->validate([
            'name' => 'required',
        ]);

        BlogCategory::where('id', $id)->update([
            'name' => $validated['name'],
        ]);

        return redirect('/admin/blogcategory');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        BlogCategory::destroy($id);
        return redirect('/admin/blogcategory');
    }
}
