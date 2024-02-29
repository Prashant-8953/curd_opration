<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Groups_ extends Model
{
    use HasFactory;
    protected $primaryKey = 'group_id';

    function members(){

        return $this->hasMany('App\Models\member_','group_id','group_id');
    }

}
