<?php

Route::group(['middleware' => 'web', 'prefix' => 'parameters/tags', 'namespace' => 'Modules\Tags\Http\Controllers'], function()
{
    Route::get('/', 'TagsController@index')->name('tags.index')->middleware('auth');
    Route::post('/store', 'TagsController@store')->name('tags.store')->middleware('auth');

    Route::post('/update/{id}', 'TagsController@update')->name('tags.update')->middleware('auth');
    Route::delete('/destroy/{id}', 'TagsController@destroy')->name('tags.destroy')->middleware('auth');
});
