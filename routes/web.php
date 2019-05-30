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


Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

// // Authentication Routes
// Route::get('/home',function(){
//     if (!Auth::user()) {
//         return redirect('login');
//     }
//     else if(Auth::user()->role == 'Admin'){
//         return view('Adminhome');
//     }else if(Auth::user()->role == 'Users'){

//         return redirect('/Event');
//     }
//     else if(Auth::user()->role == 'Agency'){
//         return view('Agencyhome');
//     }else{
//         return redirect('login');
//     }
// });


// Events routes
Route::resource('/home','HomeController');

Route::resource('/Event','EventController');

Route::get('/EventInfo/{id}','EventController@eventInfo');

//Route::get('/Event/{id}','EventController@edit');

Route::put('/Events/{id}','EventController@updatestatus');

Route::get('/userEvent/create/{id}','userEventController@create');

Route::resource('/userEvent','userEventController');

Route::resource('/bid','bidingController');






