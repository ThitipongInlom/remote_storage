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
// Add Select Item
Route::get('/addselectitem', 'Addselectitemcontroller@Add_select_item')->middleware('auth')->name('addselectitem');
Route::post('/save_add_item_windows', 'Addselectitemcontroller@save_add_item_windows')->name('save_add_item_windows');
Route::post('/save_add_item_department', 'Addselectitemcontroller@save_add_item_department')->name('save_add_item_department');
Route::post('/save_add_item_hotel', 'Addselectitemcontroller@save_add_item_hotel')->name('save_add_item_hotel');
Route::post('/save_edit_item_windows', 'Addselectitemcontroller@save_edit_item_windows')->name('save_edit_item_windows');
Route::post('/save_edit_item_department', 'Addselectitemcontroller@save_edit_item_department')->name('save_edit_item_department');
Route::post('/save_edit_item_hotel', 'Addselectitemcontroller@save_edit_item_hotel')->name('save_edit_item_hotel');
Route::post('/save_delete_item', 'Addselectitemcontroller@save_delete_item')->name('save_delete_item');

// API Make
Route::group(['prefix' => 'api/v1','middleware' => 'auth'], function () {
    Route::post('/ajax_table_main', 'Dashboardcontroller@Ajax_Table_Main');
    Route::post('/ajax_table_main_store', 'Dashboardstorecontroller@Ajax_Table_Main');
    Route::post('/ajax_load_item_view_history/{sticker_number}', 'Viewitemcontroller@Load_item_view_history');
    Route::post('/ajax_get_item_notuse', 'Dashboardstorecontroller@Get_item_notuse');
});
