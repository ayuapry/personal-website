<?php

namespace App\Http\Controllers;

use App\Models\PortoCategory;
use Illuminate\Http\Request;

class PortoCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $portocategories = PortoCategory::all();
        return view("admin.portocategory.index", ["portocategories" => $portocategories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.portocategory.add");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            "name" => "required",
        ]);

        PortoCategory::create([
            "name" => $validated["name"],
        ]);

        return redirect('/admin/portocategory');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $portocategory = PortoCategory::findOrFail($id);
        return view("admin.portocategory.edit", ["portocategory" => $portocategory]);
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

        PortoCategory::where('id', $id)->update([
            'name' => $validated['name'],
        ]);

        return redirect('/admin/portocategory');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        PortoCategory::destroy($id);
        return redirect('/admin/portocategory');
    }
}
