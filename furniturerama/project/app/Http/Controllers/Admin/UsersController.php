<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use \Auth;
use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'User Table';
        $users = User::paginate(10);
        return view('/admin/user/view',compact('title','users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Add New user";
        $user = User::all();
        return view('/admin/user/add',compact('title','user'));
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
            'image' => 'nullable|image',
            'userFirstName' => ['required', 'string', 'max:255','regex:/^([A-Z][a-z]{1,255})$/'],
            'userLastName' => ['required', 'string', 'max:255', 'regex:/^([A-Z][a-z]{1,255})$/'],
            'birthDate' => ['required', 'date'],
            'phone' => ['required', 'string', 'max:255', 'regex:/^([\d]{3}(\.)[\d]{3}(\.)[\d]{4})|([\d]{3}(\-)[\d]{3}(\-)[\d]{4})|(\([\d]{3}\)(\s)[\d]{3}(\-)[\d]{4})|([\d]{10})$/'],
            'street' => ['required', 'string', 'max:255', 'regex:/^([\d]{0,4}[A-Za-z\s]{2,255})$/'],
            'post' => ['required', 'string', 'max:255', 'regex:/^[a-zA-z][\d][a-zA-z][\s]?[\d][a-zA-z][\d]$/'],
            'city' => ['required', 'string', 'max:255', 'regex:/^([A-Za-z][A-z\s]{2,255})$/'],
            'province' => ['required', 'string', 'max:255', 'regex:/^([A-Za-z][A-z\s]{2,255})$/'],
            'email' => ['required', 'max:255', 'unique:users', 'regex:/^([\w]{1,32}[\!\-\.]?[\w]{1,32})@([\w]{1,32})\.([a-z]{2,12})$/'],
            'admin' => 'required',
            'password' => ['required', 'min:8', 'regex:/^(?=.[a-z])(?=.[A-Z])(?=.\d)(?=.[@$!%?&])[A-Za-z\d@$!%?&]{8,}$/','confirmed'],
        ]);

        if(!empty($valid['image'])){

            $file = $request->file('image');
            //get the original file name
            $image = time(). '_' . $file->getClientOriginalName();
            //save the image
            $path = $file->storeAs('images', $image);
        }
        else{
            $image= 'man.png';
        }

        User::create([
            'userFirstName' => $valid['userFirstName'],
            'userLastName' => $valid['userLastName'],
            'birthDate' => $valid['birthDate'],
            'email' => $valid['email'],
            'phone' => $valid['phone'],
            'street' => $valid['street'],
            'post' => $valid['post'],
            'city' => $valid['city'],
            'province' => $valid['province'],
            'admin' => $valid['admin'],
            'password' => $valid['password'],
            'image'=>'/images/'. $image
        ]);

        return redirect('/admin/user/view')->with('success', 'Your new user was saved successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = "Update a User";
        $user = User::find($id);
        return view('/admin/user/edit',compact('title','user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $user= User::find($request->input('id'));
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
            'email' => ['required', 'max:255', 'unique:users', 'regex:/^([\w]{1,32}[\!\-\.]?[\w]{1,32})@([\w]{1,32})\.([a-z]{2,12})$/'],
            'admin' => 'required'
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
        $user->admin = $valid['admin'];
        if(!empty($image)) {
            $user->image = '/images/'.$image;
        }


        if( $user->save() ) {
            return redirect('/admin/user/view')->with('success', 'user has been successfully updated!');
        }

        return redirect('/admin/user/view')->with('error', 'There was a problem updating the user!');

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

        if(User::find($valid['id'])->delete() ){
            return back()->with('success', 'User has been deleted!'); 
        } 
            return back()->with('error', 'There was a problem deleting the user'); 
    }
}
