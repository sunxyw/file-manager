<?php

Auth::routes();

Route::get('/{dir?}', 'RootController@index')->name('index');
Route::get('file/{file}', 'RootController@show')->name('file.show');
