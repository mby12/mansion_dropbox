<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');

// Route::get("/in", function(){
//     return view("item.in");
// })->name("item.in");

// Route::get("/out", function(){
//     return view("item.out");
// })->name("item.out");

Auth::routes();

Route::resource('in', "inController");
Route::resource('out', "outController");
Route::resource('report', "reportController");

Route::prefix('pengambilan')->group(function () {
    Route::post("takeCheck", "mainController@checkAmbilBarang")->name("item.check");
    Route::post('take', "mainController@ambilBarang")->name("item.take");
});

Route::get('/home', 'HomeController@index')->name('home');
