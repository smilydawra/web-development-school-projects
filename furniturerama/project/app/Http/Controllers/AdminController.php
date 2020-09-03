<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Furniture;
use App\Order;
use App\User;
use App\Category;
use App\Promotion;
use App\Review;
use App\Material;
use App\Manufacturer;

class AdminController extends Controller
{
    public function home(){
        $title= 'Dashboard';
        $furniture = Furniture::all()->count();
        $order = Order::all()->count();
        $user = User::all()->count();
        $category = Category::all()->count();
        $promotion = Promotion::all()->count();
        $review = Review::all()->count();
        $material = Material::all()->count();
        $manufacturer = Manufacturer::all()->count();
        $furniture_max = Furniture::all()->max('cost');
        $order_max = Order::all()->max('finalPrice');
        $furniture_min = Furniture::all()->min('cost');
        $order_min = Order::all()->min('finalPrice');
        $furniture_avg = Furniture::all()->avg('cost');
        $order_avg = Order::all()->avg('finalPrice');


        return view('admin/dashboard', compact('title','furniture','order','user', 'furniture_max','order_max','furniture_min', 'order_min','furniture_avg','order_avg', 'category','promotion','review','material','manufacturer'));
    }


}
