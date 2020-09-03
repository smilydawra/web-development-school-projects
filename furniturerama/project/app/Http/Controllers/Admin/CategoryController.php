<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Category Table';
        $category = Category::all();
        return view('/admin/category/view',compact('title','category'));
    }


     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Add New Category";
        $category = Category::all();
        return view('/admin/category/add',compact('title','category'));
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
            'categoryName' => 'required|string|max:255',
        ]);

        Category::create([
            'categoryName' => $valid['categoryName'],
        ]);

        return redirect('/admin/category/view')->with('success', 'Your new category was saved successfully');
    }

     /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = "Update a Category";
        $category = Category::find($id);
        return view('/admin/category/edit',compact('title','category'));
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
            'categoryName' => 'required|string|max:255',
        ]);

        $category = Category::find($valid['id']);
        $category->categoryName = $valid['categoryName'];
       

        if( $category->save() ) {
            return redirect('/admin/category/view')->with('success', 'Category Name has been successfully updated!');
        }

        return redirect('/admin/category/view')->with('error', 'There was a problem updating the category!');

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

        if(Category::find($valid['id'])->delete() ){
            return back()->with('success', 'Category has been deleted!'); 
        } 
            return back()->with('error', 'There was a problem deleting the Category'); 
    }

}
