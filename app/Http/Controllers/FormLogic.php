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

        // p($request->all()); // use helperfile and use this own creating funtion.
        // die;

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
    $data = compact('display_data');// ye ek array function hai jo vriable ke data ko array ke rup me store karta hai
    return view('display')->with($data);//with $data se hum  data ko display page per le jarahe hai.
   
}

public function trash_data_view(){
        $display_data = FormData::onlyTrashed()->get();
        $data = compact('display_data');
        return view('move_trash')->with($data);

    }





public function trash_data_restore($id){

    $delete_data=FormData::withTrashed()->find($id);
   $delete_data->restore();
   return redirect(url('stud_data_display'));
      
}

public function force_data_del($id){

    $delete_data=FormData::withTrashed()->find($id);
   $delete_data->forceDelete();
   return redirect(url('stud_data_display'));
      
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
    $url = url('/stud_data_update').'/'.$id;//new url banake data aur id ko yaha laya.

    $title = 'Update Registration Form';//hum jo registration page liya tha usi ke title ko change kiya.dynimicaly

    $available_data=compact('edit_data','url','title');// ye tino variable ke data ko array me leke welcome page per aagaya.

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
