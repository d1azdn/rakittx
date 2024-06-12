<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Brand;
use App\Models\Category;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.sparepart',[
            'products' => Product::with(['brand','category'])->orderBy('updated_at', 'DESC')->get(),
            'brands' => Brand::all(),
            'categories' => Category::all(),
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
            'product_name' => "required",
            'brand_id' => "required|numeric",
            'category_id' => "required|numeric",
            'desc' => "required",
            'price' => "required|numeric",
            'stock' => "required|numeric",
            'discount' => "required|numeric",
        ]);

        $validated['brand_id'] = intval($validated['brand_id']);
        $validated['category_id'] = (int) $validated['category_id'];
        $validated['price'] = (int) $validated['price'];
        $validated['stock'] = (int) $validated['stock'];
        $validated['discount'] = (int) $validated['discount'];
        
        Product::create($validated);
        return redirect('/dashboard/sparepart');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product, $id)
    {
        $rules = [
            'product_name' => "required",
            'brand_id' => "required|numeric",
            'category_id' => "required|numeric",
            'desc' => "required",
            'price' => "required|numeric",
            'stock' => "required|numeric",
            'discount' => "required|numeric",
        ];

        $validated = $request->validate($rules);

        $brand = Product::where('id', $id)->update([
            'product_name' => $request->input('product_name'),
            'brand_id' => $request->input('brand_id'),
            'category_id' => $request->input('category_id'),
            'desc' => $request->input('desc'),
            'price' => $request->input('price'),
            'stock' => $request->input('stock'),
            'discount' => $request->input('discount'),
        ]);

        if (!$brand) {
            return redirect()->back()->with('error', 'Post not found.');
        }
        return redirect('/dashboard/sparepart');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product, $id)
    {
        if (Product::find($id)){
            Product::destroy($id);
            return redirect('/dashboard/sparepart')->with('success', 'Field sudah dihapus');
        } else {
            return redirect('/dashboard/sparepart')->with('success', 'Field tidak ditemukan');
        }
    }
}
