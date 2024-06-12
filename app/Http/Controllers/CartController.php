<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('cartPage.cart', [
            'carts' => Cart::with(['user','product'])->where('user_id', Auth::user()->id)->get()
            
        ]);
    }

    public function adminIndex()
    {
        return view('admin.dashboard', [
            'carts' => Cart::with(['user','product'])->get()
            
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
    public function store(Request $request, $slug)
    {
        if ($slug == 'Premium1' || $slug == 'Premium7'){
            $reqData = $request->all();
            $reqData['user_id'] = Auth::user()->id;

            // $validated = $reqData->validate([
            //     'user_id' => "required",
            //     'product_id' => "required",
            //     'amount' => "required",
            //     'total' => "required",
            //     'process' => "required"
            // ]);

            Cart::create($reqData);

            return redirect('/rakitpc/')->with('success', "Item telah masuk ke keranjang anda.");
        }
        $validated = $request->validate([
            'user_id' => "required",
            'product_id' => "required",
            'amount' => "required",
            'total' => "required",
            'process' => "required"
        ]);
        
        Cart::create($validated);

        return redirect('/sparepart/')->with('success', "Item telah masuk ke keranjang anda.");
    }

    
    // public function adminStore(Request $request, $slug)
    // {
    //     $validated = $request->validate([
    //         'user_id' => "required",
    //         'product_id' => "required",
    //         'amount' => "required",
    //         'total' => "required",
    //         'process' => "required"
    //     ]);
        
    //     Cart::create($validated);
    //     return redirect('/dashboard/');
    // }

    /**
     * Display the specified resource.
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cart $cart, $id)
    {
        $brand = Cart::where('user_id', Auth::user()->id)->update([
            'process' => 'needConfirm',
        ]);

        if (!$brand) {
            return redirect()->back()->with('error', 'Process not found.');
        }
        return redirect('/cart');
    }

    public function adminUpdate(Request $request, Cart $cart, $id)
    {
        $brand = Cart::where('id',$id)->update([
            'process' => 'confirmed',
        ]);

        if (!$brand) {
            return redirect()->back()->with('error', 'Process not found.');
        }
        return redirect('/dashboard');
    }

    public function adminDone(Request $request, Cart $cart, $id)
    {
        $brand = Cart::where('id',$id)->update([
            'note' => $request->input('note'),
            'process' => 'done'
        ]);

        if (!$brand) {
            return redirect()->back()->with('error', 'Process not found.');
        }
        return redirect('/dashboard');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cart $cart, $id)
    {
        if (Cart::find($id)){
            Cart::where('id',$id)->delete();
            return redirect('/cart')->with('success', 'Field sudah dihapus');
        } else {
            return redirect('/cart')->with('success', 'Field tidak ditemukan');
        }
    }

    public function adminDestroy(Cart $cart, $id)
    {
        if (Cart::find($id)){
            Cart::where('id',$id)->delete();
            return redirect('/dashboard')->with('success', 'Field sudah dihapus');
        } else {
            return redirect('/dashboard')->with('success', 'Field tidak ditemukan');
        }
    }
}
