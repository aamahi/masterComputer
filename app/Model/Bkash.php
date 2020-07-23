<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Bkash extends Model
{
    public function user(){
        return $this->hasOne(User::class,'id','user_id');
    }
}
