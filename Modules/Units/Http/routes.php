<?php

Route::group(['middleware' => 'web', 'prefix' => 'parameters/units', 'namespace' => 'Modules\Units\Http\Controllers'], function()
{
    Route::get('/', 'UnitsController@index')->name('units.index')->middleware('auth');
    Route::post('/create', 'UnitsController@store')->name('units.store')->middleware('auth');
    Route::post('/update/{id}', 'UnitsController@update')->name('units.update')->middleware('auth');
    Route::delete('/destroy/{id}', 'UnitsController@destroy')->name('units.destroy')->middleware('auth');
});
