<?php

namespace App\Http\Controllers;

use \App\Review;
use Illuminate\Http\Request;
use \App\User;
use \App\Furniture;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'user_id' => 'required|integer',
            'furniture_id' => 'required|integer',
            'rating' => 'required|integer',
            'title' => 'required|string',
            'comment' => 'required|string'
        ]);

        $review = new Review();

        $review->user_id = $valid['user_id'];
        $review->furniture_id = $valid['furniture_id'];
        $review->rating = $valid['rating'];
        $review->title = $valid['title'];
        $review->comment = $valid['comment'];


        $review->save();

        return back()->with('success', 'Your review has been saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
