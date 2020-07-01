<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use DB;
use Session;

class PagesController extends Controller
{
    //

    public function index(){
        //2) access database
       // $products=DB::table('products')->get();

       //3) access database
      // $products=Product::get();
       //$products=Product::orderBy('product_name','desc')->get();
       $products=Product::orderBy('product_name','desc')->paginate(3);
       //$products=Product::inRandomOrder()->get();


        return view('pages.index')->with('products',$products);
    }
    public function about(){
        return view('pages.about');
    }
    public function services(){
        return view('pages.services');
    }

    public function show($id){
       //print($id);
         //$product = DB::table('products')->where('id',$id)->get();
        // $product = DB::table('products')->where('id',$id)->first();
       // return '<h1>'.$product.'</h1>';// view($product);
       $product=Product::find($id);
       return view('pages.show')->with('product',$product);
    }

    public function create(){
        return view('pages.create');
    }
    public function saveproduct(Request $request){
       /* $product = new Product();
        $product->product_name=$request->product_name;
        $product->product_price=$request->product_price;
        $product->product_description=$request->product_description;
        $product->save();*/
        
        if(!$request->product_name || !$request->product_price ||!$request->product_description ){
            Session::put('error','All field are required!');
        }
        $this->validate($request,['product_name'=>'required','product_price'=>'required','product_description'=>'required']);

        $data =array();
        // $data['product_name']= $request->product_name;
        // $data['product_price']= $request->product_price;
        // $data['product_description']= $request->product_description;
        $data['product_name']= $request->product_name;
        $data['product_price']= $request->product_price;
        $data['product_description']= $request->product_description;
        DB::table('products')->insert($data);

        Session::put('success','The product is added successfully!');
        return redirect('/index');
    }

    public function editproduct($id){
        $product = Product::find($id);
        return view('pages.edit')->with('product',$product);
    }
    public function updateproduct(Request $request){
        // $product = Product::find($request->id);
        //for if the model is created
        // $product->product_name=$request->input('product_name');
        // $product->product_price=$request->input('product_price');
        // $product->product_description=$request->input('product_description');
        // $product->update();
        
        if(!$request->product_name || !$request->product_price ||!$request->product_description ){
            Session::put('error','All field are required!');
        }
        $this->validate($request,['product_name'=>'required','product_price'=>'required','product_description'=>'required']);

        //directly access to database
        $data =array();
        $data['product_name']= $request->product_name;
        $data['product_price']= $request->product_price;
        $data['product_description']= $request->product_description;
        DB::table('products')->where('id',$request->id)->update($data);

        Session::put('success','The product is updated successfully!');
        return redirect('/index');
    }
    public function deleteproduct($id){
       //with model
        // $product = Product::find($id);
        // $product->delete();

        //with database
        DB::table('products')->where('id',$id)->delete();

        Session::put('success','The product is deleted successfully!');
        return redirect('/index');
    }
}
