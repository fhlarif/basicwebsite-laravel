<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Session;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products=Product::orderBy('product_name','desc')->paginate(3);
        return view('products.index')->with('products',$products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!$request->product_name || !$request->product_price ||!$request->product_description ){
            Session::put('error','All field are required!');
        }
        $this->validate($request,['product_name'=>'required','product_price'=>'required','product_description'=>'required','product_image'=>'image|nullable|max:1999']);

        $fileNameWithExtension=$request->file('product_image')->getClientOriginalName();
        $fileName=pathinfo($fileNameWithExtension, PATHINFO_FILENAME);
        $extension=$request->file('product_image')->getClientOriginalExtension();
        $fileNameStore=$fileName.'_'.time().'.'.$extension;

        print($request->product_image);
        print($fileNameWithExtension);
        print($fileName);
        print($extension);
        print($fileNameStore);
       /* $product = new Product();
        $product->product_name=$request->product_name;
        $product->product_price=$request->product_price;
        $product->product_description=$request->product_description;
        $product->save();
        Session::put('success','The product is added successfully!');
        return redirect('/products');*/
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product=Product::find($id);
        return view('products.show')->with('product',$product);
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
        return view('products.edit')->with('product',$product);
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
        if(!$request->product_name || !$request->product_price ||!$request->product_description ){
            Session::put('error','All field are required!');
        }
        $this->validate($request,['product_name'=>'required','product_price'=>'required','product_description'=>'required','product_image'=>'image|nullable|max:1999']);

        // //for if the model is created
        $product = Product::find($id);
       
        $product->product_name=$request->input('product_name');
        $product->product_price=$request->input('product_price');
        $product->product_description=$request->input('product_description');
        $product->update();

        Session::put('success','The product is updated successfully!');
        return redirect('/products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();

        Session::put('success','The product is deleted successfully!');
        return redirect('/products');
    }
}
