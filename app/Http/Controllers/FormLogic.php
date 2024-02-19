<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FormData;

class FormLogic extends Controller
{
    public function welcome_form_view(){
        return view('welcome');
    }


    public function welcome_form_data_inserted(Request $request){


        $request->validate(
            [
                'name'=>'required|max:50',
                'email'=>'required|email|max:80',
                'password'=>'required|min:8',
                'dob'=>'required'
            ]
        );

    $insert_data = new FormData;
    $insert_data->student_name = $request['name'];
    $insert_data->email = $request['email'];
    $insert_data->password = md5($request['password']);
    $insert_data->DOB = $request['dob'];
    $insert_data->save();

    
    return redirect(url('stud_data_display'));

}


public function welcome_form_data_display(Request $request){

    $display_data=FormData::all();
    $data = compact('display_data');
    return view('display')->with($data);
   
}


public function welcome_form_data_delete($id){

    $delete_data=FormData::find($id);
   $delete_data->delete();
   return redirect(url('stud_data_display'));
   
}


}
