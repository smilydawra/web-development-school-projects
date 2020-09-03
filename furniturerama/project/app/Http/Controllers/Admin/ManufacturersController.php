<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Manufacturer;

class ManufacturersController extends Controller
{
     public function index()
    {
        $title = 'Manufacturer Table';
        $manufacturers = Manufacturer::all();
        return view('/admin/manufacturer/view',compact('title','manufacturers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Add New Manufacturer";
        $manufacturers = Manufacturer::all();
        return view('/admin/manufacturer/add',compact('title','manufacturers'));
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
            'manufacturerName' => 'required|string|max:255',
        ]);

        Manufacturer::create([
            'manufacturerName' => $valid['manufacturerName'],
        ]);

        return redirect('/admin/manufacturer/view')->with('success', 'Your new manufacturer was saved successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = "Update a Manufacturer";
        $manufacturer = Manufacturer::find($id);
        return view('/admin/manufacturer/edit',compact('title','manufacturer'));
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
            'manufacturerName' => 'required|string|max:255',
        ]);

        $manufacturer = Manufacturer::find($valid['id']);
        $manufacturer->manufacturerName = $valid['manufacturerName'];
       

        if( $manufacturer->save() ) {
            return redirect('/admin/manufacturer/view')->with('success', 'Manufacturer Name has been successfully updated!');
        }

        return redirect('/admin/manufacturer/view')->with('error', 'There was a problem updating the manufacturer!');

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

        if(Manufacturer::find($valid['id'])->delete() ){
            return back()->with('success', 'Manufacturer has been deleted!'); 
        } 
            return back()->with('error', 'There was a problem deleting the Manufacturer'); 
    }
}
