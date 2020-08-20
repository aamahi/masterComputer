<?php

namespace App\Http\Controllers;

use App\Model\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function product(){

        $products = Product::all();
        return view('admin.product',compact('products'));
    }
    public function addProduct(Request $request){
        $this->validate($request,[
            'product_name'=>'required',
            'price'=>'required',
        ]);
        $product =[];
        $product['product_name']=$request->product_name;
        $product['price']=$request->price;
        $product['description']=$request->description;
        $product['created_at']=Carbon::now();

        Product::insert($product);
        $notification = array(
            'message' => "Product Added !",
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    public function editProduct($id){
        $product = Product::find($id);
        return view('admin.editProduct',compact('product'));
    }
    public function updateProduct(Request $request,$id){
        $this->validate($request,[
            'product_name'=>'required',
            'price'=>'required',
        ]);
        $product=Product::find($id);
        $product->product_name = $request->product_name;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->save();

        $notification = array(
            'message' => "Product Updated !",
            'alert-type' => 'info'
        );
        return redirect()->route('product')->with($notification);
    }

    public function deleteProduct($id){
        $product = Product::find($id)->delete();
        $notification = array(
            'message' => "Product Deleted !",
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }
}
