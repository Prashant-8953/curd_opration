<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member_;

class IndexController extends Controller
{
    public function index(){

        return Member_::find()->getGroup;
    }
}
