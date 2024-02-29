<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member_ extends Model
{

    use HasFactory;
    protected $primaryKey='member_id';

// ye function one to one ke liye ----------------------------------

//    public function getGroup(){

//         return $this->hasOne('App\Models\Groups_','group_id');
//     }



// one to many -------------------------


   public function getGroup(){

        return $this->hasMany('App\Models\Groups_','group_id','group_id');
    }



}
