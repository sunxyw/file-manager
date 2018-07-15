<?php

Auth::routes();

Route::get('/{dir?}', 'RootController@index')->name('index');
