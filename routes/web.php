<?php
// Login Page
Route::get('/', function () { return view('auth/login'); })->name('login');
Route::post('/do_login', 'Logincontroller@do_login');
// Register
Route::get('/register', function () { return view('auth/register'); });
Route::post('/register_save', 'Registercontroller@register_save')->name('register_save');
// Logout
Route::get('/logout', function () { Auth::logout(); return redirect('/'); })->name('logout');
// Page
Route::get('/dashboard', function () { return view('page/dashboard'); })->middleware('auth')->name('dashboard');


// API Make
Route::group(['prefix' => 'api/v1','middleware' => 'auth'], function () {
    Route::post('/ajax_table_main', 'Dashboardcontroller@Ajax_Table_Main');
});