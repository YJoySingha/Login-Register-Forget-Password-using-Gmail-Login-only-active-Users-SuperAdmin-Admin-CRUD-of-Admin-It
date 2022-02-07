<?php

use Illuminate\Support\Facades\Route;

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

//register and login

Route::get('/', 'AuthController@index'); 

Route::get('/index', 'AuthController@index'); 

Route::get('/login', 'AuthController@loginIndex'); 

Route::post('post-register', 'AuthController@postRegister'); 

Route::post('post-login', 'AuthController@postLogin'); 

Route::get('logout', 'AuthController@logout');


//forget password    ForgotPasswordController

Route::get('forget-password', 'ForgotPasswordController@showForgetPasswordForm')->name('forgetpassword');

Route::post('forget-password', 'ForgotPasswordController@submitForgetPasswordForm')->name('forgetpasswordpost'); 

Route::get('reset-password/{token}', 'ForgotPasswordController@showResetPasswordForm')->name('resetpassword');

Route::post('reset-password/{token}', 'ForgotPasswordController@submitResetPasswordForm')->name('resetpasswordpost');

//admin panel

Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function(){

    Route::get('/index', 'AuthController@adminIndex');

    //add admin

    Route::get('/add-admin', 'AuthController@adminAdd'); 

    Route::get('/profile-admin', 'AuthController@profileAdmin')->name('profile');

    Route::post('/add-admin-post', 'AuthController@adminAddPost'); 

    Route::get('/admin-details', 'AuthController@adminDetails'); 

    Route::get('/edit-admin/{id}', 'AuthController@adminEdit'); 

    Route::post('/update-admin/{id}', 'AuthController@adminUpdate'); 

    
    //active and inactive

    Route::post('/changeStatusOfAdmin', 'AuthController@changeStatusOfAdmin');

    //API url calling using guzzle HTTP

    Route::get('/api-details', 'AuthController@adminApiDetails'); 

    //items for admin

    Route::get('/add-items', 'ItemsController@adminAddItems'); 

    Route::post('/add-item-post', 'ItemsController@adminAddItemsPost'); 

    Route::get('/item-details', 'ItemsController@adminItemDetails'); 

    Route::get('/edit-item/{id}', 'ItemsController@itemEdit');  

    Route::post('/update-item/{id}', 'ItemsController@itemUpdate'); 

});


