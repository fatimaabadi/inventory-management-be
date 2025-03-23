<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{
    //home
    public function  home() 
    {

        $products = Product::with('category','colors')->orderBy('created_at','desc')->get();
        //dd($products);
        // Check if the attributes have values
        //dd($products->first()->toArray());
        //dd($products->toArray());
        return view('pages.home',['products' => $products]);
    }

    //cart
      public function  cart() 
    {
         // dd(session()->get('cart'));
       return view('pages.cart');
    }


    //wishlist

    public function  wishlist() 
    {
        $products = Auth::User()->wishlist;
        return view('pages.wishlist',['products' => $products]);
    }


    //account

    public function  account() 
    {
        return view('pages.account');
    }


    //checkout 
    public function  checkout() 
    {
        return view('pages.checkout');
    }



    public function  product($id) 
    {

        $product = Product::with('category','colors')->findOrFail($id);
        return view('pages.product',['product' => $product]);
    }



}
