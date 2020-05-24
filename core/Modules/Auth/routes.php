<?php

use \Illuminate\Support\Facades\Route;

Route::group([
    'prefix'=>'auth',
],function(){
    Route::get('/reset','ResetPasswordController@reset')->name('Auth.auth.reset');
    Route::post('/check-email','ResetPasswordController@checkMail')->name('Auth.auth.check-mail');
    Route::get('/validator-otp','ResetPasswordController@otp')->name('Auth.auth.otp');
    Route::post('/validator-otp','ResetPasswordController@validatorOtp')->name('Auth.auth.validator');
});
