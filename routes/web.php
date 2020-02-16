<?php

/**
 * Download company profile
 * return response()->download(Storage::get($file_path), 200);
 */


Route::view('/', 'welcome');
Route::get('/contact', 'ContactController@show')->name('contacts.show');
Route::post('/contact', 'ContactController@store')->name('contacts.store');

Route::get('/dashboard', 'DashboardController@index');

Route::group(['prefix' => 'dashboard'], function () {
    Route::any('logout', 'Auth\LoginController@logout')->name('logout');
    Auth::routes(['register' => false]);

    Route::group(['middleware' => 'auth'], function () {
        Route::resource('/categories', 'CategoryController');
        Route::get('/photos/create', 'PhotoController@create')->name('photos.create');
        Route::post('/photos', 'PhotoController@store')->name('photos.store');
        Route::delete('/photos/{photo}', 'PhotoController@destroy')->name('photos.destroy');
    });
});

