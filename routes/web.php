<?php

Route::middleware(['guest'])->group(function () {
    Route::get('login','LoginController@loginForm')->name('login.form');
    Route::post('login','LoginController@login')->name('login.submit');

    Route::get('register','RegisterController@registerForm')->name('register.form');
    Route::post('register','RegisterController@register')->name('register.submit');

    Route::get('verification/success','VerificationController@success')->name('verification.success');
    Route::get('verification/error','VerificationController@error')->name('verification.error');
    Route::get('verification/verify/{userID}','VerificationController@verify')->name('verification.verify');
});

Route::middleware(['auth'])->group(function () {
    Route::get('logout','LoginController@logout')->name('logout');

    Route::get('dashboard','DashboardController@index')->name('dashboard.index');
});
