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
Route::get('/dashboard', 'Dashboardcomcontroller@View_Dashboardcom')->middleware('auth')->name('dashboard');
Route::get('/dashboardbattery', 'Dashboardbatterycontroller@View_Dashboardbattery')->middleware('auth')->name('dashboardbattery');
Route::get('/dashboardwifi', function () { return view('page/dashboardwifi'); })->middleware('auth');
Route::get('/settingconnectdb', function () { return view('page/settingconnectdb'); })->middleware('auth');
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
Route::post('/save_update_status_com', 'Viewitemcontroller@save_update_status_com')->name('save_update_status_com');

// API Make
Route::group(['prefix' => 'api/v1'], function () {
    Route::get('/Generate_wifi_group', 'Dashboardwificontroller@Generate_wifi_group');
    Route::post('/ajax_table_main', 'Dashboardcontroller@Ajax_Table_Main')->middleware('auth');
    Route::post('/ajax_table_main_battery', 'Dashboardbatterycontroller@Ajax_Table_Main')->middleware('auth');
    Route::post('/ajax_table_main_wifi', 'Dashboardwificontroller@Ajax_Table_Main')->middleware('auth');
    Route::post('/ajax_load_item_view_history/{sticker_number}', 'Viewitemcontroller@Load_item_view_history')->middleware('auth');
    Route::post('/ajax_list_btn_computer_number', 'Dashboardcontroller@list_btn_computer_number')->middleware('auth');
    Route::post('/Save_add_data_modal', 'Dashboardwificontroller@Save_add_data_modal')->middleware('auth');

    Route::post('/Add_ItemCom', 'Dashboardcomcontroller@Add_ItemCom')->middleware('auth');
    Route::post('/Get_ComId', 'Dashboardcomcontroller@Get_ComId')->middleware('auth');
    Route::post('/Update_ItemCom', 'Dashboardcomcontroller@Update_ItemCom')->middleware('auth');
    Route::post('/Add_ItemBattery', 'Dashboardbatterycontroller@Add_ItemBattery')->middleware('auth');
    Route::post('/Get_BatteryId', 'Dashboardbatterycontroller@Get_BatteryId')->middleware('auth');
    Route::post('/Update_Battery', 'Dashboardbatterycontroller@Update_Battery')->middleware('auth');
    Route::post('/Save_change_battery', 'Dashboardbatterycontroller@Save_change_battery')->middleware('auth');
});
