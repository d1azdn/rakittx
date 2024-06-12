<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.brand',[
            'brands' => Brand::orderBy('updated_at', 'DESC')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => "required",
            'slug' => "required|unique:brands",
        ]);
        
        Brand::create($validated);
        return redirect('/dashboard/brand');
    }

    /**
     * Display the specified resource.
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Brand $brand)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Brand $brand, $id)
    {
        $rules = [
            'title' => "required",
            'slug' => "required",
        ];

        $validated = $request->validate($rules);

        $brand = Brand::where('id', $id)->update([
            'title' => $request->input('title'),
            'slug' => $request->input('slug'),
        ]);

        if (!$brand) {
            return redirect()->back()->with('error', 'Post not found.');
        }
        return redirect('/dashboard/brand');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand, $id)
    {
        if (Brand::find($id)){
            Brand::destroy($id);
            return redirect('/dashboard/brand')->with('success', 'Field sudah dihapus');
        } else {
            return redirect('/dashboard/brand')->with('success', 'Field tidak ditemukan');
        }
    }
}
