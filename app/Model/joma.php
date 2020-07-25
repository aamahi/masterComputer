<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;

class joma extends Model
{
    public function user(){
        return $this->hasOne(User::class,'id','user_id');
    }
    public function customar(){
        return $this->hasOne(Customar::class,'id','customar_id');
    }
}
