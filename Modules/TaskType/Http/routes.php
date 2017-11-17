<?php

Route::group(['middleware' => 'web', 'prefix' => 'parameters/tasktype', 'namespace' => 'Modules\TaskType\Http\Controllers'], function()
{
    Route::get('/', 'TaskTypeController@index')->name('tasks.index')->middleware('auth');
    Route::post('/create', 'TaskTypeController@store')->name('tasks.store')->middleware('auth');
    Route::post('/update/{id}', 'TaskTypeController@update')->name('tasks.update')->middleware('auth');
    Route::delete('/destroy/{id}', 'TaskTypeController@destroy')->name('tasks.destroy')->middleware('auth');
});
