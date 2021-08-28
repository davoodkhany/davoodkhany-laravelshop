<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::latest()->paginate(20);

        return view('home.products', compact('products'));
    }


    public function show(Product $product){

        // dd($product->comments);
        $comments = $product->comments;
        return view('home.products-single', compact('product','comments'));

    }

}
