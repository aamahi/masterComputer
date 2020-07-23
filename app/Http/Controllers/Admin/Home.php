<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;

class Home extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('logout');
    }

    public function index(){
//        $today_incomes =\App\Model\Invoice::where('created_at',\Carbon\Carbon::now()->toDateString())->get();
//
//        $invoices = \App\Model\Invoice::with('customar')->where('created_at',Carbon::now()->toDateString())->latest()->get();
        return view('admin.index');
    }
//    public function stock(){
////        $products  = \App\Model\Product::with('category')->latest()->get();
//        return view('admin.product.stock',compact('products'));
//    }
}

