<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormLogic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

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

Route::get('/stud_data_display',[FormLogic::class,'welcome_form_data_display'])->name('view_data');

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


Route::get('/trash_data',[FormLogic::class,'trash_data_view'])->name('trash_data_display');


Route::get('/stud_data_restore/{id}',[FormLogic::class,'trash_data_restore'])->name('trash_data_restore');

Route::get('/force_data_del/{id}',[FormLogic::class,'force_data_del'])->name('force_data_del');



// note - use group of routing ------------------------

/*

supose humne multiple routes banaye hai like -
 /customer/view
 /customer/create
 /customer/delete
 /customer/update 
 /customer/edit ..... etc.


 to insabhi me bychance kabhi route me change karna hua to sabhi jagah karna padega like mujhe customer ki jagah user karna hua to mujhe her bar sabme jake change karna hoga.ishi ko solve karne ke liye grouping route banaye jate hai.


 syntex with example - 

 Route::group(['prefix'->'/customer'],function(){
    //by chance mujhe change karna hua customer ke jagah user karna hua to mai easly kar sakta hu.

    Route::get('/insert',[FormLogic::class,'welcome_form_insert']);
    Route::get('/delete',[FormLogic::class,'welcome_form_delete']);
    Route::get('/update',[FormLogic::class,'welcome_form_update']);
    Route::get('/edit',[FormLogic::class,'welcome_form_edit']);
    Route::get('/view',[FormLogic::class,'welcome_form_view']);

 });


*/ 



Route::get('/languages_practices/{lang?}',function($lang=null){

    App::setlocale($lang);
    return view('language_practice');
});
