<?php

use Illuminate\Support\Facades\Route;

//Route::get('/', function () {
//    return view('home',['name'=>'Todo Project']);
//});  --Gives routing to view file

//To use a function 'home' defined in TodoController --Routing to view through controller function
use App\Http\Controllers\TodoController;
Route::get('/', [TodoController::class, 'home']);

Route::get('/aboutus', function () {
    return view('aboutus',['title'=>'TodoProject|aboutus']);
});

Route::get('/contactus', function () {
    return view('contactus',['title'=>'TodoProject|contactus']);
});

Route::post('/store',[TodoController::class, 'store'])->name(name:'store');
Route::get('/edit/{id}',[TodoController::class, 'edit'])->name(name:'edit');
Route::post('/update/{todo}',[TodoController::class, 'update'])->name(name:'update');
Route::post('/delete/{todo}',[TodoController::class, 'delete'])->name(name:'delete');

