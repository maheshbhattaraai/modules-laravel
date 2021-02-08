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

Route::prefix('channel')->group(function() {
    Route::get('/', 'ChannelController@index')->name('Channel');
    Route::get('create','ChannelController@create')->name('Channel.create');
    Route::post('store','ChannelController@store')->name('Channel.store');
    Route::get('show/{id}','ChannelController@show')->name('Channel.show');
    Route::get('edit/{id}','ChannelController@edit')->name('Channel.edit');
    Route::match(['put', 'patch'],'update/{id}','ChannelController@update')->name('Channel.update');
    Route::delete('destroy/{id}','ChannelController@destroy')->name('Channel.destroy');
});
