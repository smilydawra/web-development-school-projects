<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class UserProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('user.profile');
    }


    public function edit($id)
    {
        $title = "Update Profile";
        $user = User::find($id);
        return view('/user/editProfile',compact('title','user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if(Auth::user()->email == request('email')){
            $valid = $request->validate([
                'id' => 'required|integer',
                'image' => 'nullable|image',
                'userFirstName' => ['required', 'string', 'max:255','regex:/^([A-Za-z]{1,255})$/'],
                'userLastName' => ['required', 'string', 'max:255', 'regex:/^([A-Za-z]{1,255})$/'],
                'birthDate' => ['required', 'date'],
                'phone' => ['required', 'string', 'max:255', 'regex:/^([\d]{3}(\.)[\d]{3}(\.)[\d]{4})|([\d]{3}(\-)[\d]{3}(\-)[\d]{4})|(\([\d]{3}\)(\s)[\d]{3}(\-)[\d]{4})|([\d]{10})$/'],
                'street' => ['required', 'string', 'max:255', 'regex:/^([\d]{0,4}[A-Za-z\s]{2,255})$/'],
                'post' => ['required', 'string', 'max:255', 'regex:/^[a-zA-z][\d][a-zA-z][\s]?[\d][a-zA-z][\d]$/'],
                'city' => ['required', 'string', 'max:255', 'regex:/^([A-Za-z][A-z\s]{2,255})$/'],
                'province' => ['required', 'string', 'max:255', 'regex:/^([A-Za-z][A-z\s]{2,255})$/']
            ]);

            if(!empty($valid['image'])){

                $file = $request->file('image');
                //get the original file name
                $image = time(). '_' . $file->getClientOriginalName();
                //save the image
                $path = $file->storeAs('images', $image);
            }

            $user = User::find($valid['id']);
            $user->userFirstName = $valid['userFirstName'];
            $user->userLastName = $valid['userLastName'];
            $user->birthDate = $valid['birthDate'];
            $user->phone = $valid['phone'];
            $user->street = $valid['street'];
            $user->post = $valid['post'];
            $user->city = $valid['city'];
            $user->province = $valid['province'];
            if(!empty($image)) {
                $user->image = '/images/'.$image;
            }


            if( $user->save() ) {
                return redirect('/user/profile')->with('success', 'Profile Updated!');
            }

            return redirect('/user/profile')->with('error', 'There was a problem updating your profile!');
        }


        else{
            $valid = $request->validate([
                'id' => 'required|integer',
                'image' => 'nullable|image',
                'userFirstName' => ['required', 'string', 'max:255','regex:/^([A-Z][a-z]{1,255})$/'],
                'userLastName' => ['required', 'string', 'max:255', 'regex:/^([A-Z][a-z]{1,255})$/'],
                'birthDate' => ['required', 'date'],
                'phone' => ['required', 'string', 'max:255', 'regex:/^([\d]{3}(\.)[\d]{3}(\.)[\d]{4})|([\d]{3}(\-)[\d]{3}(\-)[\d]{4})|(\([\d]{3}\)(\s)[\d]{3}(\-)[\d]{4})|([\d]{10})$/'],
                'street' => ['required', 'string', 'max:255', 'regex:/^([\d]{0,4}[A-Za-z\s]{2,255})$/'],
                'post' => ['required', 'string', 'max:255', 'regex:/^[a-zA-z][\d][a-zA-z][\s]?[\d][a-zA-z][\d]$/'],
                'city' => ['required', 'string', 'max:255', 'regex:/^([A-Za-z][A-z\s]{2,255})$/'],
                'province' => ['required', 'string', 'max:255', 'regex:/^([A-Za-z][A-z\s]{2,255})$/'],
                'email' => ['required', 'max:255', 'unique:users', 'regex:/^([\w]{1,32}[\!\-\.]?[\w]{1,32})@([\w]{1,32})\.([a-z]{2,12})$/']
            ]);

            if(!empty($valid['image'])){

                $file = $request->file('image');
                //get the original file name
                $image = time(). '_' . $file->getClientOriginalName();
                //save the image
                $path = $file->storeAs('images', $image);
            }

            $user = User::find($valid['id']);
            $user->userFirstName = $valid['userFirstName'];
            $user->userLastName = $valid['userLastName'];
            $user->birthDate = $valid['birthDate'];
            $user->email = $valid['email'];
            $user->phone = $valid['phone'];
            $user->street = $valid['street'];
            $user->post = $valid['post'];
            $user->city = $valid['city'];
            $user->province = $valid['province'];
            if(!empty($image)) {
                $user->image = '/images/'.$image;
            }


            if( $user->save() ) {
                return redirect('/user/profile')->with('success', 'Profile Updated!');
            }

            return redirect('/user/profile')->with('error', 'There was a problem updating your profile!');
        }
    }

}
