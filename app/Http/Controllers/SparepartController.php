<?php

namespace App\Http\Controllers;

use App\Models\Sparepart;
use App\Models\Product;
use App\Models\Category;

use Illuminate\Http\Request;

class SparepartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('productPage.product',[
            'products' => Product::filter(request(['search','category']))->latest()->paginate(12),
            'categories' => Category::all()
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Sparepart $sparepart, $slug)
    {
        $product = Product::with(['brand','category'])->where('product_name',urldecode($slug))->firstOrFail();
        return view('productPage.product-info', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sparepart $sparepart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sparepart $sparepart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sparepart $sparepart)
    {
        //
    }
}
