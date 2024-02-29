<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member_;
use App\Models\Groups_;

class IndexController extends Controller
{
    public function index(){

        $member = Member_::with('getGroup');

        $group = $member->get();

        echo "<pre>";
       return print_R($group->toArray());
    }

    function group(){
        echo "<pre>";
        return print_R(Groups_::with('members')->get()->toArray());
    }
}
