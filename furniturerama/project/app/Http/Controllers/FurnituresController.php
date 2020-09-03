<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use \App\User;
use \App\Cart;
use \App\Category;
use \App\Furniture;
use \App\Review;

use Session;



class FurnituresController extends Controller
{
    public function index(){
		$categories = Category::all();
		$furnitures = Furniture::with('category')->paginate(9);
		$links = $furnitures->links();
		$links = str_replace("<a", "<a class='paginate'" , $links);
		$title = "All Sale | Don't Miss Out on Specials";
		return view('furnitures/list', compact('furnitures', 'categories', 'links', 'title'));
	}


    public function home(){
        $furniture_list = Furniture::all();
        // to prevent getting 0 as an id
        for($i=1;$i<count($furniture_list);$i++){
            if($furniture_list[$i-1]->price===$furniture_list[$i-1]->cost){
                $list[$furniture_list[$i-1]->id]= $furniture_list[$i-1]->id;
            }
            else{
                $list2[$furniture_list[$i-1]->id]= $furniture_list[$i-1]->id;
            }
        }

        $furniture_rand = array_rand($list, 4);
        $furniture_rand2 = array_rand($list2, 4);
        foreach($furniture_rand as $rand){
            $furnitures[]= Furniture::find($rand);
        }
        foreach($furniture_rand2 as $rand){
            $furnitures2[]= Furniture::find($rand);
        }
        $title = 'Furniturerama';
        return view('furnitures/home_page', compact('furnitures','furnitures2' , 'title'));
    }

	public function categoryList($name){
		$categories = Category::all();
		$cat = Category::where('categoryName', $name)->with('furnitures')->first();
		$title = 'Category: ' . $name;
		return view('furnitures/categoryList', compact('cat', 'categories', 'title'));
	}

	public function detail($id){
		$furniture = Furniture::find($id);
		//category
		$fur_cat = Furniture::where('category_id', $furniture->category_id)->with('category')->first();
		//dd($fur_cat->category['categoryName']);
        $reviews = $furniture->reviews()->with('user')->get();
		$title = $furniture->title;
		return view('furnitures/detail', compact('furniture','fur_cat', 'title', 'reviews'));
	}

	public function addToCart(Request $request, $id)
    {
		$categories = Category::all();
		$furnitures = Furniture::with('category')->paginate(9);
		$links = $furnitures->links();
        $product = Furniture::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);
		$request->session()->put('cart', $cart);
		return redirect()->back()->with('success', 'The product was successfully added to your cart');
		//return view('furnitures/list', compact('furnitures', 'categories'));

    } // end of addToCart

    public function getCart()
    {

        //if there is no item stored in session cart
        if (!Session::has('cart')) {
            return view('/furnitures/cart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        return view('/furnitures/cart', ['furnitures' => $cart->items, 'totalPrice' => $cart->totalPrice, 'totalQty' =>$cart->totalQty]);
    }

    public function destroy(Request $request)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;

        $cart = new Cart($oldCart);

        $removed = $cart->remove($request->id);

        $request->session()->put('cart', $cart);

        if($removed){
            return back()->with('success', 'The product was successfully removed from your cart');
        } else {
            return back()->with('error', 'Sorry, there was a problem removing the product from your cart');
        }
    }

    public function updateQty(Request $request, $id)
    {

        $oldCart = Session::has('cart') ? Session::get('cart') : null;

        $cart = new Cart($oldCart);

        //dd($request->qty_chg);
        $cart->update($id, $request->qty_chg);

        $request->session()->put('cart', $cart);

        return response()->json(['success'=>true]);

    }



}
