<?php

namespace App\Http\Controllers;

use App\Model\mcSale;
use App\Model\Sale;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $sales  = Sale::with('user')->get();
        return view('admin.index',compact('sales'));
    }

    public function addSale(Request $request){
        $this->validate($request,[
            'amount'=>'required'
        ]);
        $sale = [];
        $sale['amount'] =$request->amount;
        $sale['user_id'] =Auth::user()->id;
        $sale['month'] =Carbon::now()->toDateString();
        $sale['created_at'] = Carbon::now();

        Sale::insert($sale);

        $notification = array(
            'message' => "Sale Amount Added !",
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function deleteSale($id){
       Sale::find($id)->delete();
        $notification = array(
            'message' => "Sale Amount Deleted !",
            'alert-type' => 'warning'
        );
        return redirect()->back()->with($notification);
    }
    public function mcSale(){
        $mcSales = mcSale::with('user')->get();
        return view('admin.mcSale',compact('mcSales'));
    }


    public function addMcSale(Request $request){
        $this->validate($request,[
            'amount'=>'required'
        ]);

        $sale = [];
        $sale['amount'] =$request->amount;
        $sale['user_id'] =Auth::user()->id;
        $sale['description'] = $request->description;
        $sale['month'] =Carbon::now()->toDateString();
        $sale['created_at'] = Carbon::now();

        mcSale::insert($sale);

        $notification = array(
            'message' => "Sale Amount Added in MC !",
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }
}
