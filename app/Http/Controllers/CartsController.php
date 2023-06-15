<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartsController extends Controller
{
    public  function add_to_cart( Request $request){
        $request -> validate([
            'amount'=> 'required|gte:1|lte:',
        ]);

        $user_id =Auth::id();
        $product_id = $product ->id;

        $save = DB::table('carts')->insert([
            'user_id' -> $user_id,
            'product_id' -> $product_id,
            'amount' -> $request->amount,
        ]);
        // Cart::create([
        //     'user_id' -> $user_id,
        //         'product_id' -> $product_id,
        //         'amount' -> $request->amount,
        // ]);
        return Redirect::route('index_product');
    }

    public function show_carts(){
        return view ('carts');
    }
}
