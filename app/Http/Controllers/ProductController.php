<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\Product;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function create_product()
    {
        return view('cretae_product');
    }

    public function store_product(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'description' => 'required',
            'image' => 'required'
        ]);

        // $file = $request->file('image');
        // $path = time() . '_' . $request->name . '.' . $file->getClientOriginalExtension();

        // Storage::disk('local')->put('public/' . $path, file_get_contents($file));

        if($request->hasFile('image')){
            $resorce       = $request->file('image');
            $path   = time() . '_' . $resorce->getClientOriginalName();
            // $resorce->move(\base_path() ."/public/images", $path);
            Storage::disk('local')->put('public/' . $path, file_get_contents($resorce));
            $save = DB::table('product')
                ->insert([
                    'name' => $request->name,
                    'price' => $request->price,
                    'stock' => $request->stock,
                    'description' => $request->description,
                    'image' => $path
                ]);
        }
        return Redirect::route('index_product');
    }
    
      public function index_product() #buat user dan admin
    {
        $products = DB::table('product') -> get();
        // mengirim data students ke view daftar
        return view('index_product', ['products' => $products]);
    }

    public function show_product() #Buat user
    {
        $product_user= DB::table('product')-> get(); 
        return view('show_product', ['product_user'=>$product_user]);
    }

    public function edit_product($id)
    {
        $edit = DB::table('product')->where('id', $id)->get();
        return view('edit_product');
    }

    public function update_product(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'description' => 'required',
            'image' => 'required'
        ]);
        
        if($request->hasFile('image')){
            $resorce       = $request->file('image');
            $path   = time() . '_' . $resorce->getClientOriginalName();
            Storage::disk('local')->put('public/' . $path, file_get_contents($resorce));
            $product = DB::table('product')
                    -> where('id',$request->id)
                    ->update([
                    'name' => $request->name,
                    'price' => $request->price,
                    'stock' => $request->stock,
                    'description' => $request->description,
                    'image' => $path
                ]);
       
        return Redirect::route('index_product');
        }

    }

    
    public function delete_product($id)
    {
        DB::table('product')->where('id', $id)->delete();
        return Redirect::route('index_product');
    }
}