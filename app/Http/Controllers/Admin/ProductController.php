<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $products = Product::query();

        if($keword = $request->search){

            $products = Product::where('title','LIKE',"%$keword%")->orWhere('id','LIKE',"%$keword%");
        }

        $products = $products->latest()->paginate(1);

        return view('admin.products.all', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([

            'title' => ' required',
            'description' => 'required',
            'price' => ' required',
            'inventory' => ' required',
        ]);



        auth()->user()->products()->create($data);

        alert()->success('محصول شما با موفقیت ایجاد شد.');

        return redirect(route('admin.products.index'));

    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('admin.products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {

        $data = $request->validate([

            'title' => ' required',
            'description' => 'required',
            'price' => ' required',
            'inventory' => ' required',
        ]);


        auth()->user()->products()->update($data);

        alert()->success('محصول شما با موفقیت ایجاد شد.');

        return redirect(route('admin.products.index'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return back();

    }
}
