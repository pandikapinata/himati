<?php

Route::get('/home', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('guest')->user();

    //dd($users);

    return view('guest.home');
})->name('home');

