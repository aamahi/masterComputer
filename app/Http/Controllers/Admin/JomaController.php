<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Customar;
use App\Model\joma;
use App\Model\TotalJoma;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JomaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $customars = Customar::select('customar_name','id','phone')->get();
        $jomas = TotalJoma::with('customar')->get();
        return view('admin.joma',compact('customars','jomas'));
    }
    public function addJoma(Request $request){
        $this->validate($request,[
            'customar_id'=>'required'
        ]);

        $joma =[];
        $joma['user_id']= Auth::User()->id;
        $joma['customar_id']=$request->customar_id;
        $joma['withdraw']=$request->withdraw;
        $joma['deposite']=$request->deposite;
        $joma['description']=$request->description;
        $joma['created_at']=Carbon::now();

        joma::insert($joma);

        if($request->deposite){
            if(TotalJoma::where('customar_id',$request->customar_id)->exists()){
                TotalJoma::where('customar_id',$request->customar_id)->increment('deposite',$request->deposite);
            }else{
                TotalJoma::insert([
                    'customar_id'=>$request->customar_id,
                    'deposite'=>$request->deposite,
                ]);
            }
        }
        if($request->withdraw){
            if(TotalJoma::where('customar_id',$request->customar_id)->exists()){
                TotalJoma::where('customar_id',$request->customar_id)->increment('withdraw',$request->withdraw);
            }else{
                TotalJoma::insert([
                    'customar_id'=>$request->customar_id,
                    'withdraw'=>$request->withdraw,
                ]);
            }
        }

        $notification = array(
            'message' => "Joma Hisab Added ",
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }

    public function viewJoma($id){
        $customar_info = Customar::find($id);
       $jomas = joma::where('customar_id',$id)->orderBy('id','DESC')->get();
       return view('admin.viewJoma',compact('jomas','customar_info'));
    }
}
