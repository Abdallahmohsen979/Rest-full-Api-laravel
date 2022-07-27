<?php
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactsController;
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


Route::get('/',function(){
    return view('auth.login');
});


Route::controller(ContactsController::class)->group(function(){
    Route::get('contacts','index')->name("home");
    Route::get('showcontact/{id}','show');
    Route::put('updatecontact/{id}','edit');
    Route::post('createcontact','create');
    Route::delete('destroycontact/{id}','destroy');
    
});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('phones', App\Http\Controllers\PhoneController::class)->middleware('auth');



