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

Route::get('/', function () {
    return view('/login-page/login');
});

Route::get('/chat', function () {
    return view('chat');
}); 

Route::get('/login', function () {
    return view('/login-page/login');
});

Route::POST('user_login','UserCompanyController@user_login');
Route::GET('user_contacts', 'UserCompanyController@user_contacts'); 

Route::POST('save_messages', 'ConversationController@save_message');
Route::GET('display_messages', "ConversationController@display_message");
// Route::GET('get_messages/{id}', "ConversationController@get_message");

Route::POST('add_new_contact', 'UserActionsController@add_new_contact'); 
Route::GET('display_new_contact', 'UserActionsController@display_new_contact'); 

Route::GET('logout', "UserCompanyController@logout")->name('logout');




