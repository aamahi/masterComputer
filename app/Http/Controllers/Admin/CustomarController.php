<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Customar;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CustomarController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function customar(){
        $customars = Customar::latest()->get();
        return view('admin.customar',compact('customars'));
    }
    public function addCustomar(Request $request){
        $this->validate($request,[
            'customar_name'=>'required',
            'phone'=>'required|size:11',
        ]);
        $customar =[];
        $customar['customar_name'] =$request->customar_name;
        $customar['phone'] =$request->phone;
        $customar['address'] =$request->address;
        $customar['created_at'] =Carbon::now();
        Customar::insert($customar);
        $notification = array(
            'message' => "Customar Add to Bookmark!",
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    public function deleteCustomar($id){
        Customar::find($id)->delete();
        $notification = array(
            'message' => "Customar Deleted to Bookmark!",
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }

    public function editCustomar($id){
        $customarInfo = Customar::find($id);
        return view('admin.editCustomar',compact('customarInfo'));
    }
    public function updateCustomar(Request $request,$id){
        $this->validate($request,[
            'customar_name'=>'required'
        ]);
        $cusmarInfo = Customar::find($id);
        $cusmarInfo->customar_name = $request->customar_name;
        $cusmarInfo->phone = $request->phone;
        $cusmarInfo->address = $request->address;
        $cusmarInfo->save();
        $notification = array(
            'message' => "Customar Information Updated!",
            'alert-type' => 'success'
        );
        return redirect()->route('customar')->with($notification);
    }
}
