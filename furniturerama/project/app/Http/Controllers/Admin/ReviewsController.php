<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Review;
use App\User;
use App\Furniture;

class ReviewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Review Table';
        $reviews = Review::paginate(10);
        $user = User::all();
        $furniture = Furniture::all();
        return view('/admin/review/view',compact('title','reviews','furniture'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Add New Review";
        $review = Review::all();
        $user = User::all();
        $furniture = Furniture::all();
        return view('/admin/review/add',compact('title','review','user','furniture'));
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
            'user_id' => 'required|integer|exists:App\User,id',
            'furniture_id' => 'required|integer|exists:App\Furniture,id',
            'rating' => 'required|string|max:45',
            'title' => 'required|string|max:255',
            'comment' => 'required'
        ]);

        Review::create([
            'user_id' => $valid['user_id'],
            'furniture_id' => $valid['furniture_id'],
            'rating' => $valid['rating'],
            'title' => $valid['title'],
            'comment' => $valid['comment']
        ]);

        return redirect('/admin/review/view')->with('success', 'Your new review was saved successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = "Update a Review";
        $review = Review::find($id);
        $user = User::all();
        $furniture = Furniture::all();
        return view('/admin/review/edit',compact('title','review','user','furniture'));
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
            'user_id' => 'required|integer|exists:App\User,id',
            'furniture_id' => 'required|integer|exists:App\Furniture,id',
            'rating' => 'required|string|max:45',
            'title' => 'required|string|max:255',
            'comment' => 'required'
        ]);

        $review = Review::find($valid['id']);
        $review->user_id = $valid['user_id'];
        $review->furniture_id = $valid['furniture_id'];
        $review->rating = $valid['rating'];
        $review->title = $valid['title'];
        $review->comment = $valid['comment'];


        if( $review->save() ) {
            return redirect('/admin/review/view')->with('success', 'Review has been successfully updated!');
        }

        return redirect('/admin/review/view')->with('error', 'There was a problem updating the review!');

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

        if(Review::find($valid['id'])->delete() ){
            return back()->with('success', 'Review has been deleted!'); 
        } 
            return back()->with('error', 'There was a problem deleting the review'); 
    }
}

