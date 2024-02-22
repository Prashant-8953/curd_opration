<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormLogic;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[FormLogic::class,'welcome_form_view'])->name('insert_data');
Route::post('/stud_data_fatch',[FormLogic::class,'welcome_form_data_inserted']);

Route::get('/stud_data_display',[FormLogic::class,'welcome_form_data_display']);

Route::get('/stud_data_delete/{id}',[FormLogic::class,'welcome_form_data_delete'])->name('delete_data');

Route::get('/stud_data_edit/{id}',[FormLogic::class,'welcome_form_data_edit'])->name('edit_data');
Route::post('/stud_data_update/{id}',[FormLogic::class,'welcome_form_data_update']);


// yaha session se data le ke aaye hai to use kare mtlb retrive karna ho
Route::get('get-all-session', function(){
    
    $session_variable = session()->all();
    p($session_variable);
});

    // yaha session me data bherahe hai to  use kare mtlb store karna ho

Route::get('set-session', function(Request $request ){

    $request->session()->put('user_name','prasahnt');
    $request->session()->put('pass','555');
    $request->session()->flash('hello','ahsvb');
    return redirect(url('get-all-session'));

    // note - put ka data jab tak session destroy nahi hota tab rahta hai leki flash ka data kewal ek bar ke liye hi jata hai dusri bar jaha koi request hui vo hat jata hai.


});



// session destroy ke liye 

Route::get('destroy-session', function(Request $request ){

   session()->forget(['user_name','pass']);
//    session()->forget('pass');
   return redirect(url('get-all-session'));
});


