<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/user/profile';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'userFirstName' => ['required', 'string', 'max:255','regex:/^([A-Za-z]{1,255})$/'],
            'userLastName' => ['required', 'string', 'max:255', 'regex:/^([A-Za-z]{1,255})$/'],
            'birthDate' => ['required', 'date'],
            'phone' => ['required', 'string', 'max:255', 'regex:/^([\d]{3}(\.)[\d]{3}(\.)[\d]{4})|([\d]{3}(\-)?[\d]{3}(\-)?[\d]{4})|(\([\d]{3}\)(\s)[\d]{3}(\-)[\d]{4})|([\d]{10})$/'],
            'street' => ['required', 'string', 'max:255', 'regex:/^([\d]{0,4}[A-Za-z\s]{2,255})$/'],
            'post' => ['required', 'string', 'max:255', 'regex:/^[a-zA-z][\d][a-zA-z][\s]?[\d][a-zA-z][\d]$/'],
            'city' => ['required', 'string', 'max:255', 'regex:/^([A-Za-z][A-z\s]{2,255})$/'],
            'province' => ['required', 'string', 'max:255', 'regex:/^([A-Za-z][A-z\s]{2,255})$/'],
            'email' => ['required', 'max:255', 'unique:users', 'regex:/^([\w]{1,32}[\!\-\.]?[\w]{1,32})@([\w]{1,32})\.([a-z]{2,12})$/'],
            'password' => ['required', 'min:8', 'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/','confirmed'],
            'image' => 'nullable|image',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        if(!empty($data['image'])){

            $file = $request->file('image');
            //get the original file name
            $image = time(). '_' . $file->getClientOriginalName();
            //save the image
            $path = $file->storeAs('images', $image);
        }
        else{
            $image= 'man.png';
        }
        return User::create([
            'userFirstName' => $data['userFirstName'],
            'userLastName' => $data['userLastName'],
            'birthDate' => $data['birthDate'],
            'phone' => $data['phone'],
            'street' => $data['street'],
            'post' => $data['post'],
            'city' => $data['city'],
            'province' => $data['province'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'image'=>'/images/'. $image,
            'admin' => false,
        ]);
    }
}
