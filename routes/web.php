<?php
// Login Page
Route::get('/', function () { return view('auth/login'); })->name('login');
Route::post('/do_login', 'Logincontroller@do_login');
// Register
Route::get('/register', function () { return view('auth/register'); });
Route::post('/register_save', 'Registercontroller@register_save')->name('register_save');
// Logout
Route::get('/logout', function () { Auth::logout(); return redirect('/'); })->name('logout');
// Dashboard Page
Route::get('/dashboard', function () { return view('page/dashboard'); })->middleware('auth')->name('dashboard');
// Add Item
Route::get('/additem', 'Additemcontroller@Add_item')->middleware('auth')->name('add');
Route::post('/additem_save', 'Additemcontroller@Additem_save')->name('additem_save');
// View Item
Route::get('/view/{sticker_number}', 'Viewitemcontroller@Load_item')->middleware('auth')->name('view');
Route::post('/update_item_view_save', 'Viewitemcontroller@Update_item_view_save')->name('update_item_view_save');


// API Make
Route::group(['prefix' => 'api/v1','middleware' => 'auth'], function () {
    Route::post('/ajax_table_main', 'Dashboardcontroller@Ajax_Table_Main');
    Route::post('/ajax_load_item_view_history/{sticker_number}', 'Viewitemcontroller@Load_item_view_history');
});
