<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Tax;

class TaxesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Tax Table';
        $taxes = Tax::paginate(10);
        return view('/admin/tax/view',compact('title','taxes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Add New Tax";
        $tax = Tax::all();
        return view('/admin/tax/add',compact('title','tax'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $valid = $request->validate([
            'province' => 'required|string|max:45',
            'GST' => 'nullable|numeric|regex:/^[0\.]{2}[0-9]{1,2}$/',
            'HST' => 'nullable|numeric|regex:/^[0\.]{2}[0-9]{1,2}$/',
            'PST' => 'nullable|numeric|regex:/^[0\.]{2}[0-9]{1,2}$/'
        ]);

        Tax::create([
            'province' => $valid['province'],
            'GST' => $valid['GST'],
            'HST' => $valid['HST'],
            'PST' => $valid['PST'],
        ]);

        return redirect('/admin/tax/view')->with('success', 'Your new tax was saved successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = "Update a Tax";
        $tax = Tax::find($id);
        return view('/admin/tax/edit',compact('title','tax'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $valid = $request->validate([
            'id' => 'required|integer',
            'province' => 'required|string|max:45',
            'GST' => 'nullable|numeric|regex:/^[0\.]{2}[0-9]{1,2}$/',
            'HST' => 'nullable|numeric|regex:/^[0\.]{2}[0-9]{1,2}$/',
            'PST' => 'nullable|numeric|regex:/^[0\.]{2}[0-9]{1,2}$/'
        ]);

        $tax = Tax::find($valid['id']);
        $tax->province = $valid['province'];
        $tax->GST = $valid['GST'];
        $tax->HST = $valid['HST'];
        $tax->PST = $valid['PST'];


        if( $tax->save() ) {
            return redirect('/admin/tax/view')->with('success', 'Tax has been successfully updated!');
        }

        return redirect('/admin/tax/view')->with('error', 'There was a problem updating the tax!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $valid = $request->validate([
            'id' => 'required|integer'
        ]);

        if(Tax::find($valid['id'])->delete() ){
            return back()->with('success', 'Tax has been deleted!');
        }
            return back()->with('error', 'There was a problem deleting the tax');
    }
}
