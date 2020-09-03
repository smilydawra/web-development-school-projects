<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use \App\Category;
use \App\Furniture;

class SearchController extends Controller
{
    /**
     * search for search term in furniture table
     * @param  Request $request 
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $categories = Category::all();

        $valid = $request->validate([
            's' => 'required|string'
        ]);

        $s = $valid['s'];

        if($s != "" ){

            $furnitures = Furniture::where('name','like', "%$s%")
                                    ->orwhere('description','like', "%$s%")
                                    ->orwhere('color','like', "%$s%")
                                    ->with('material','category')
                                    ->paginate(9)->setPath('');
            $links = $furnitures->appends(array (
                's' => $s
            ));
            $links = str_replace("<a", "<a class='paginate'" , $links);

            if(count($furnitures) > 0 ){
                $title = 'Search Result(s) for: ' . "'" . $s . "'";
                            
                return view('furnitures/searchList', compact('furnitures','categories', 'title', 'links'));
            }

            $title = 'No Result(s) found';
                        
            return view('furnitures/searchList', compact('furnitures','categories', 'title'));                

        }


    

    }
}
