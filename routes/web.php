<?php

use App\Events\messageEvent;
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

// Route::get('/', function () {
//     return view('layouts.app');
// });

Route::group(['middleware' => 'prevent-back-history'],function(){
    
    Route::livewire('/','first-page');
    Route::livewire('/about','about-page');
    Route::livewire('/comment','comment-page');
    Route::livewire('/login','login-page')->name('login');
    Route::livewire('/register','register-page')->name('register');
    Route::livewire('/dashboard','dashboard-page')->name('dashboard')->middleware('auth');
   

    //get and store token
    Route::post('/storeToken','fcmTokenController@saveToken')->name('store.token');
    


});


Route::post('/push','PushController@store');
Route::get('/push','PushController@push')->name('push');

//get live comment data
//Route::get('/getCommentData','commentLiveDataController@getLiveData')->name('liveCommentData');

// Route::get('event',function(){

//         // event(new messageEvent('Hello! world.'));
// });

// Route::get('listen',function(){
//         return view('listenPage');
// });