<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Order;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products=Product::All();
        return view('product_index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view ('product_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $product = new Product;

        $product -> name = $request -> name;
        $product -> price = $request -> price;
        $product -> description = $request -> description;
        $product -> stock = $request -> stock;

        $imgName = $request->img_path->getClientOriginalName() . '-' . time();
        $request->img_path->move(public_path('image'), $imgName);

        $product -> img_path = $imgName;
        $product -> save();

        return redirect('/product');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $product = Product::find($id);

        return view('product_edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = product::find($id);

        $imgName = $product->img_path;
        if ($request->img_path) {
            $imgName = $request->img_path->getClientOriginalName() . '-' . time();
            $request->img_path->move(public_path('image'), $imgName);
        }

        $product -> name = $request -> name;
        $product -> price = $request -> price;
        $product -> description = $request -> description;
        $product -> stock = $request -> stock;
        $product -> img_path = $imgName;

        $product -> save();

        return redirect('/product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        \DB::table('orders')->where('product_id', '=', $id) -> delete();
        Product::find($id)->delete();

        return redirect('/product');
    }
}
