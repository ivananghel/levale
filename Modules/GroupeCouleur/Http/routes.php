<?php

Route::group(['middleware' => 'web', 'prefix' => 'parameters/groupecouleur', 'namespace' => 'Modules\GroupeCouleur\Http\Controllers'], function()
{
    Route::get('/', 'GroupeCouleurController@index')->name('groupecouleur.index')->middleware('auth');
    Route::post('/store', 'GroupeCouleurController@store')->name('groupecouleur.store')->middleware('auth');
    Route::post('/update/{id}', 'GroupeCouleurController@update')->name('groupecouleur.update')->middleware('auth');
    Route::delete('/destroy/{id}', 'GroupeCouleurController@destroy')->name('groupecouleur.destroy')->middleware('auth');
    Route::get('/edit/{id}', 'GroupeCouleurController@edit')->name('groupecouleur.edit')->middleware('auth');
    Route::get('/create', 'GroupeCouleurController@create')->name('groupecouleur.create')->middleware('auth');
    Route::post('/table', 'GroupeCouleurController@table')->name('groupecouleur.table')->middleware('auth');
});
