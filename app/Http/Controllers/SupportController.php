<?php

namespace App\Http\Controllers;

use App\Models\Support;
use Illuminate\Http\Request;

class SupportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Support::filter()->orderBy('updated_at', 'desc')->get();
        return view('supportPage.support', compact('data'));
    }

    public function adminIndex()
    {
        return view('admin.support',[
            'supports' => Support::orderBy('updated_at','desc')->get()
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

    public function adminStore(Request $request)
    {
        $validated = $request->validate([
            'title' => "required",
            'slug' => "required|unique:supports",
            'text' => "required"
        ]);
        
        Support::create($validated);
        return redirect('/dashboard/support');
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        $data = Support::where('slug',$slug)->firstOrFail();
        return view('supportPage.support-info', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Support $support)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Support $support)
    {
        //
    }

    public function adminUpdate(Request $request, Support $support, $id)
    {
        $rules = [
            'title' => "required",
            'slug' => "required|unique:supports",
            'text' => "required"
        ];

        $validated = $request->validate($rules);

        $support = Support::where('id', $id)->update([
            'title' => $request->input('title'),
            'slug' => $request->input('slug'),
            'text' => $request->input('text'),
        ]);

        if (!$support) {
            return redirect()->back()->with('error', 'Post not found.');
        }
        return redirect('/dashboard/support');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Support $support)
    {
        //
    }

    public function adminDestroy(Support $support, $id){
        if (Support::find($id)){
            Support::destroy($id);
            return redirect('/dashboard/support')->with('success', 'Field sudah dihapus');
        } else {
            return redirect('/dashboard/support')->with('success', 'Field tidak ditemukan');
        }
    }
}
