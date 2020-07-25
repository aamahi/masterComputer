<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;

class TotalJoma extends Model
{
    public function customar(){
        return $this->hasOne(Customar::class,'id','customar_id');
    }
}
