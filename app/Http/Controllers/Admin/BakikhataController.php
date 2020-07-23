<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\BakiKhata;
use App\Model\Customar;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BakikhataController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function bakiKhata(){
        $customars = Customar::latest()->get();
        return view('admin.bakiKhata',compact('customars'));
    }
    public function addbakiKhata(Request $request)
    {
        $this->validate($request, [
            'customar_id' => 'required'
        ]);

        $bakiKhata = [];
        $bakiKhata['customar_id'] = $request->customar_id;
        $bakiKhata['user_id'] = Auth::user()->id;
        $bakiKhata['due'] = $request->due;
        $bakiKhata['joma'] = $request->joma;
        $bakiKhata['comment'] = $request->comment;
        $bakiKhata['created_at'] = Carbon::now();

        if ($request->due and $request->joma) {
            Customar::find($request->customar_id)->increment('joma',$request->joma);
            Customar::find($request->customar_id)->increment('due',$request->due);
        } elseif ($request->due) {
            Customar::find($request->customar_id)->increment('due',$request->due);
        } elseif ($request->joma) {
            Customar::find($request->customar_id)->increment('joma',$request->joma);
        }

        BakiKhata::insert($bakiKhata);
        $notification = array(
            'message' => "Add information to Bakikahta !",
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);

    }

    public function bakiHisab($id){
        $customar_info = Customar::find($id);
        $hisabs = BakiKhata::with('user')->where('customar_id',$id)->latest()->get();
        return view('admin.hisabAll',compact('hisabs','customar_info'));
    }
}

