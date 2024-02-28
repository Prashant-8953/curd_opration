<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member_ extends Model
{

    use HasFactory;
    protected $primary='member_id';
    function getGroup(){
        return $this->hasOne('App\Models\Groups_','group_id');
    }
}
