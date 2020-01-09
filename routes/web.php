<?php

Route::middleware(['guest'])->group(function () {
    Route::get('login','LoginController@loginForm')->name('login.form');
    Route::post('login','LoginController@login')->name('login.submit');

    Route::get('register','RegisterController@registerForm')->name('register.form');
    Route::post('register','RegisterController@register')->name('register.submit');
});

Route::middleware(['auth'])->group(function () {
    Route::get('logout','LoginController@logout')->name('logout');

    Route::get('dashboard','DashboardController@index')->name('dashboard.index');
});
