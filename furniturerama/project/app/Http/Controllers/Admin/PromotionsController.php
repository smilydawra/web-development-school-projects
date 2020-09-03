<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Promotion;

class PromotionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Promotion Table';
        $promotions = Promotion::paginate(10);
        return view('/admin/promotion/view',compact('title','promotions'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Add New Promotion";
        $promotion = Promotion::all();
        return view('/admin/promotion/add',compact('title','promotion'));
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
            'promotionCode' => 'required|max:12',
            'promotionAmount' => 'required|numeric'
        ]);

        Promotion::create([
            'promotionCode' => $valid['promotionCode'],
            'promotionAmount' => $valid['promotionAmount'],
        ]);

        return redirect('/admin/promotion/view')->with('success', 'Your new promotion was saved successfully');
    }
    
     /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = "Update a Promotion";
        $promotion = Promotion::find($id);
        return view('/admin/promotion/edit',compact('title','promotion'));
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
            'promotionCode' => 'required|max:12',
            'promotionAmount' => 'required|numeric'
        ]);

        $promotion = Promotion::find($valid['id']);
        $promotion->promotionCode = $valid['promotionCode'];
        $promotion->promotionAmount = $valid['promotionAmount'];



        if( $promotion->save() ) {
            return redirect('/admin/promotion/view')->with('success', 'Promotion has been successfully updated!');
        }

        return redirect('/admin/promotion/view')->with('error', 'There was a problem updating the promotion!');

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

        if(Promotion::find($valid['id'])->delete() ){
            return back()->with('success', 'Promotion has been deleted!'); 
        } 
            return back()->with('error', 'There was a problem deleting the promotion'); 
    }
}