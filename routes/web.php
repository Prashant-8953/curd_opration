<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormLogic;

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

Route::get('/',[FormLogic::class,'welcome_form_view']);
Route::post('/stud_data_fatch',[FormLogic::class,'welcome_form_data_inserted']);
Route::get('/stud_data_display',[FormLogic::class,'welcome_form_data_display']);
