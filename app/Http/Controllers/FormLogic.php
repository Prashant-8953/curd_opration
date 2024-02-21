<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FormData;

class FormLogic extends Controller
{
    public function welcome_form_view(){

        $url = url('/stud_data_fatch');
        $title = "Registration Form";
        $data=compact('url','title');
        return view('welcome')->with($data);
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


public function welcome_form_data_edit($id){

    $edit_data=FormData::find($id);
    if(is_null($edit_data)){
        // user not found
        return redirect('display');
    }
  else{
    //founded
    $url = url('/stud_data_update').'/'.$id;
    $title = 'Update Registration Form';
    $available_data=compact('edit_data','url','title');
    return view('welcome')->with($available_data);
  }

  
}

public function welcome_form_data_update(Request $req , $id){
   
    $update_data_stud=FormData::find($id);

    

    $update_data_stud->student_name = $req['name'];
    $update_data_stud->email = $req['email'];
    // $update_data_stud->password = md5($req['password']);
    $update_data_stud->DOB = $req['dob'];
    $update_data_stud->save();

    return redirect(url('stud_data_display'));
}


}
