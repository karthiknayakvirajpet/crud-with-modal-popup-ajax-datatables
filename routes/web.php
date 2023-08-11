<?php

use Illuminate\Support\Facades\Route;

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

//ContactController routes
Route::controller(App\Http\Controllers\ContactController::class)->group(function () 
{
    //Contact CRUD
    Route::get('/', 'index');
    Route::any('index-contact', 'index')->name('contact.index');
    Route::post('store-contact', 'store')->name('contact.store');
    Route::get('edit-contact/{id}', 'edit')->name('contact.edit');
    Route::post('update-contact', 'update')->name('contact.update');
    Route::get('delete-contact/{id}', 'delete')->name('contact.delete');
});
