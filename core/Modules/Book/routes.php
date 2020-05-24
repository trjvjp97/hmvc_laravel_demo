<?php

use Illuminate\Support\Facades\Route;

Route::group([
   'prefix' => '/books',
   'middleware' => ['auth','role:admin'],

],function(){

    Route::get('/','BookController@index')->name('Book.books.index');
    Route::get('{book}/edit','BookController@find')->name('Book.books.edit');
    Route::patch('{book}/update','BookController@update')->name('Book.books.update');
    Route::get('/create','BookController@create')->name('Book.books.create');
    Route::post('/store','BookController@store')->name('Book.books.store');
    Route::delete('{book}/destroy','BookController@destroy')->name('Book.books.destroy');
});
