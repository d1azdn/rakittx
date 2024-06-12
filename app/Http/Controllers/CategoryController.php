<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.category',[
            'categories' => Category::orderBy('updated_at', 'DESC')->get()
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
            'slug' => "required|unique:categories",
            'url' => "required",
        ]);
        
        Category::create($validated);
        return redirect('/dashboard/category');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category, $id)
    {
        $rules = [
            'title' => "required",
            'slug' => "required",
            'url' => "required",
        ];

        $validated = $request->validate($rules);

        $brand = Category::where('id', $id)->update([
            'title' => $request->input('title'),
            'slug' => $request->input('slug'),
            'url' => $request->input('url'),
        ]);

        if (!$brand) {
            return redirect()->back()->with('error', 'Post not found.');
        }
        return redirect('/dashboard/category');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category, $id)
    {
        if (Category::find($id)){
            Category::destroy($id);
            return redirect('/dashboard/category')->with('success', 'Field sudah dihapus');
        } else {
            return redirect('/dashboard/category')->with('success', 'Field tidak ditemukan');
        }
    }
}
