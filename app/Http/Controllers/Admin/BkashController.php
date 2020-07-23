<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BkashRequest;
use App\Model\Bkash;
use App\Model\ReciveBkash;
use App\Model\SendBkash;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BkashController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function bkash(){
        $bkashInfo = Bkash::with('user')->latest()->get();
        return view('admin.bkash',compact('bkashInfo'));

    }
    public function addBkash(Request $request){
        $this->validate($request,
            ['number'=>"required",
            'amount'=>"required",]
        );
        $recive = $request->recive;
        $send = $request->send;
        $amount = $request->amount;
        $number = $request->number;

        $bkash=[];
        $bkash['number']=$number;
        $bkash['comment']=$request->comment;
        $bkash['amount']=$amount;
        $bkash['user_id']=Auth::user()->id;
        $bkash['created_at']=Carbon::now();
//        return  $request->all();
//        die();

        if(''!=$recive){
                $bkash['recive'] = $recive;
                Bkash::insert($bkash);
                $notification = array(
                    'message' => "Taka Recive by Customar",
                    'alert-type' => 'success'
                );
                return redirect()->back()->with($notification);

        }elseif(''!=$send){
            $bkash['send'] =$request->send;
            Bkash::insert($bkash);
            $notification = array(
                'message' => "Taka Send to Customar",
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }elseif (4==strlen($number)){
            $bkash['recive'] = 1;
            Bkash::insert($bkash);
            $notification = array(
                'message' => "Taka Dosen't Recive",
                'alert-type' => 'warning'
            );
            return redirect()->back()->with($notification);
        }elseif (11==strlen($number)){
            $bkash['send'] =1;
            Bkash::insert($bkash);
            $notification = array(
                'message' => "Taka Not Send",
                'alert-type' => 'warning'
            );
            return redirect()->back()->with($notification);
        }
        else{
            Bkash::insert($bkash);
             $notification = array(
            'message' => "Nullable Acount Added",
            'alert-type' => 'warning'
        );
        return redirect()->back()->with($notification);
        }
    }
    public function reciveBkash($id){
        $reciveBkash= Bkash::find($id);
        $reciveBkash->recive = $reciveBkash->amount;
        $reciveBkash->user_id = Auth::user()->id;
        $reciveBkash->created_at = Carbon::now();
        $reciveBkash->save();
        $notification = array(
            'message' => "Recived by Customar",
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }
    public function sendBkash($id){
        $sendBkash= Bkash::find($id);
        $sendBkash->send = $sendBkash->amount;
        $sendBkash->user_id = Auth::user()->id;
        $sendBkash->created_at = Carbon::now();
        $sendBkash->save();
        $notification = array(
            'message' => "Send to Customar",
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }
    public function deleteBkash($id){
        $sendBkash= Bkash::find($id);
        $sendBkash->delete();
        $notification = array(
            'message' => "Delete Bkash Number",
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }

    public function editBkash($id){
       $bkashInfo = Bkash::find($id);
       return view('admin.editBkash',compact('bkashInfo'));
    }

    public function updateBkash(Request $request,$id){
        $this->validate($request,
            ['number'=>"required",
                'amount'=>"required",]
        );

        $recive = $request->recive;
        $send = $request->send;
        $amount = $request->amount;
        $number = $request->number;
        $user = Auth::user()->id;

        $bkashInfo = Bkash::find($id);
        $bkashInfo->number =$number;
        $bkashInfo->recive =$recive;
        $bkashInfo->send =$send;
        $bkashInfo->amount =$amount;
        $bkashInfo->user_id =$user;
        $bkashInfo->comment =$request->comment;
        $bkashInfo->created_at =Carbon::now();
//
//        if(''!=$recive){
//            $bkashInfo->recive =$request->recive;
//            $bkashInfo->send =0;
//            $bkashInfo->save();
//            $notification = array(
//                'message' => "Information updated !",
//                'alert-type' => 'info'
//            );
//            return redirect()->route('bkash')->with($notification);
//        }elseif(''!=$send){
//            $bkashInfo->send =$request->send;
//            $bkashInfo->recive =0;
//            $bkashInfo->save();
//            $notification = array(
//                'message' => "Information updated !",
//                'alert-type' => 'success'
//            );
//            return redirect()->route('bkash')->with($notification);
//        }else{
            $bkashInfo->save();
            $notification = array(
                'message' => "Information updated !",
                'alert-type' => 'info'
            );
            return redirect()->route('bkash')->with($notification);
//        }
    }

}
