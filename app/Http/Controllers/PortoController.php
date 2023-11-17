<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use App\Models\PortoCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PortoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $portfolios = Portfolio::with("portocategory")->get();
        return view("admin.portfolio.index", ["portfolios" => $portfolios]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $porto_categories = PortoCategory::all();
        return view("admin.portfolio.add", ["porto_categories" => $porto_categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            "content_title" => "required|min:5",
            "content" => "required|min:10",
            "tanggal" => "required",
            "url" => "required",
            "portocategory_id" => "required",
            "image" => "required|mimes:jpg,jpeg,png|max:5120",
        ]);

        $saveImage['image'] = Storage::putFile('public/image', $request->file('image'));

        // mebnambahkan ke dalam database
        Portfolio::create([
            "content_title" => $validated["content_title"],
            "content" => $validated["content"],
            "tanggal" => $validated["tanggal"],
            "url" => $validated["url"],
            "portocategory_id" => $validated["portocategory_id"],
            'image' => $saveImage['image']
        ]);

        return redirect('/admin/portfolio');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $portfolio = Portfolio::with('portocategory')->findOrFail($id);
        $porto_categories = PortoCategory::all();
        return view('admin.portfolio.edit', ['portfolio' => $portfolio, 'porto_categories' => $porto_categories]);
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
        $portfolio = Portfolio::findOrFail($id);
        $validated = $request->validate([
            'content_title' => 'string',
            'content' => 'string',
            'url' => 'string',
            'image' => 'mimes:jpg,jpeg,png|max:5120',
            'portocategory_id' => 'required',
        ]);

        if ($request->hasFile('image')) {
            Storage::delete($portfolio->image);

            $newImage = ['image' => Storage::putFile('public/image', $request->file('image'))];
        } else {
            $newImage = ['image' => $portfolio->image];
        }

        Portfolio::where('id', $id)->update([
            "content_title" => $validated["content_title"],
            "content" => $validated["content"],
            "url" => $validated["url"],
            "portocategory_id" => $validated["portocategory_id"],
            'image' => $newImage['image']
        ]);

        return redirect('/admin/portfolio');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Portfolio::destroy($id);
        return redirect('/admin/portfolio');
    }
}
