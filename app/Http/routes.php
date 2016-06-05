<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('/', 'HomeController@index');
Route::get('home',function (){
   return  redirect()->action('HomeController@index');
});
Route::get('facture/{id}',function($id){

   $res=App\Reservation::with('client')->with('car')->findOrFail($id);
   return view('facture',compact('res'));

});
Route::get('voiture',function (){
   $cars=\App\Car::get();
   return view('voiture',compact('cars'));
});
Route::resource('gest','gestController');
Route::resource('gestt','gesttController');

//Route::resource('admin','adminController');

Route::resource('adminge','adminGestController');
Route::resource('adminca','adminCarController');
Route::resource('admincl','adminClientController');

Route::resource('res','reservationController');

/*
Route::group(['prefix' => 'not'], function() {

    Route::get('admin',function(){
      return view('not/notAdmin');
    });
    Route::get('gest',function(){
        return view('not/notGestionnaire');
    });

});
*/
Route::auth();
