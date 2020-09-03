<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Material;

class MaterialsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Material Table';
        $materials = Material::paginate(10);
        return view('/admin/material/view',compact('title','materials'));
    }

      /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Add New Material";
        $material = Material::all();
        return view('/admin/material/add',compact('title','material'));
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
            'materialName' => 'required|string|max:255',

        ]);

        Material::create([
            'materialName' => $valid['materialName'],
        ]);

        return redirect('/admin/material/view')->with('success', 'Your new material was saved successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = "Update a Material";
        $material = Material::find($id);
        return view('/admin/material/edit',compact('title','material'));
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
            'materialName' => 'required|string|max:255',
        ]);

        $material = Material::find($valid['id']);
        $material->materialName = $valid['materialName'];



        if( $material->save() ) {
            return redirect('/admin/material/view')->with('success', 'Material has been successfully updated!');
        }

        return redirect('/admin/material/view')->with('error', 'There was a problem updating the material!');

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

        if(Material::find($valid['id'])->delete() ){
            return back()->with('success', 'Material has been deleted!'); 
        } 
            return back()->with('error', 'There was a problem deleting the material'); 
    }

}
