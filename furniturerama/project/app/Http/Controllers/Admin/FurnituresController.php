<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Furniture;
use App\Category;
use App\Material;
use App\Manufacturer;

class FurnituresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Furniture Table';
        $furnitures = Furniture::paginate(10);
        $category = Category::all();
        return view('/admin/furniture/view',compact('title','furnitures','category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Add New Furniture";
        $furniture = Furniture::all();
        $category = Category::all();
        $material = Material::all();
        $manufacturer = Manufacturer::all();
        return view('/admin/furniture/add',compact('title','furniture','category','material','manufacturer'));
    }
    public function search(Request $request)
    {
        $title = 'Furniture Table Search';
        $search = $request->get('search');
        $furnitures = Furniture::where('name', 'like', '%'.$search.'%')->paginate(10);
        return view('/admin/furniture/view', compact('search', 'furnitures', 'title'));
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
            'name' => [ 'required','string','max:100','regex:/^([A-Z]([A-z\s\d]{1,255}))?$/' ],
            'price' => 'required|numeric',
            'depth' => 'required|numeric|max:1000',
            'height' => 'required|numeric|max:1000',
            'width' => 'required|numeric|max:1000',
            'cost' => 'required|numeric',
            'description' => 'required',
            'image' => 'required|image',
            'color' =>['required','regex:/^([A-Za-z][A-z\s]{2,255})$/'],
            'SKU' => ['required','regex:/^[\d]{10}$/','unique:furniture,SKU'],
            'in_stock' => 'required',
            'category_id' => 'required|integer',
            'material_id' => 'required|integer',
            'manufacturer_id' => 'required|integer'
        ]);

        if(!empty($valid['image'])){

            $file = $request->file('image');
            //get the original file name
            $image = time(). '_' . $file->getClientOriginalName();
            //save the image
            $path = $file->storeAs('images/furniture', $image);
        }

        Furniture::create([
            'name' => $valid['name'],
            'price' => $valid['price'],
            'depth' => $valid['depth'],
            'height' => $valid['height'],
            'width' => $valid['width'],
            'cost' => $valid['cost'],
            'description' => $valid['description'],
            'color' => $valid['color'],
            'image' => '/images/furniture/'.$image ?? '',
            'SKU' => $valid['SKU'],
            'category_id' => $valid['category_id'],
            'material_id' => $valid['material_id'],
            'manufacturer_id' => $valid['manufacturer_id']
        ]);

        return redirect('/admin/furniture/view')->with('success', 'Your new furniture was saved successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = "Update a Furniture";
        $furniture = Furniture::find($id);
        $category = Category::all();
        $material = Material::all();
        $manufacturer = Manufacturer::all();
        return view('/admin/furniture/edit',compact('title','furniture','category','material','manufacturer'));
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
            'name' => [ 'required','string','max:100','regex:/^([A-Z]([A-z\s\d]{1,255}))?$/' ],
            'price' => 'required|numeric',
            'depth' => 'required|numeric|max:1000',
            'height' => 'required|numeric|max:1000',
            'width' => 'required|numeric|max:1000',
            'cost' => 'required|numeric',
            'description' => 'required',
            'image' => 'required|image',
            'color' =>['required','regex:/^([A-Za-z][A-z\s]{2,255})$/'],
            'SKU' => ['required','regex:/^[\d]{10}$/','unique:furniture,SKU'],
            'in_stock' => 'required',
            'category_id' => 'required|integer',
            'material_id' => 'required|integer',
            'manufacturer_id' => 'required|integer'
        ]);

        if(!empty($valid['image'])){

            $file = $request->file('image');
            //get the original file name
            $image = time(). '_' . $file->getClientOriginalName();
            //save the image
            $path = $file->storeAs('images/furniture', $image);
        }

        $furniture = Furniture::find($valid['id']);
        $furniture->name = $valid['name'];
        $furniture->price = $valid['price'];
        $furniture->depth = $valid['depth'];
        $furniture->height = $valid['height'];
        $furniture->width = $valid['width'];
        $furniture->cost = $valid['cost'];
        $furniture->description = $valid['description'];
        $furniture->color = $valid['color'];
        $furniture->SKU = $valid['SKU'];
        $furniture->in_stock = $valid['in_stock'];
        $furniture->category_id = $valid['category_id'];
        $furniture->manufacturer_id = $valid['manufacturer_id'];
        $furniture->material_id = $valid['material_id'];
        if(!empty($image)) {
            $furniture->image = '/images/furniture/'.$image;
        }

        if( $furniture->save() ) {
            return redirect('/admin/furniture/view')->with('success', 'Furniture has been successfully updated!');
        }

        return redirect('/admin/furniture/view')->with('error', 'There was a problem updating the Furniture!');

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

        if(Furniture::find($valid['id'])->delete() ){
            return back()->with('success', 'Furniture has been deleted!'); 
        } 
            return back()->with('error', 'There was a problem deleting the furniture'); 
    }
}
