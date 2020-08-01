<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Model\Item as Item;
use App\Model\User as User;
use App\Model\Department as Department;
use App\Model\Hotel as Hotel;
use App\Model\Window as Window;
use App\Model\ChangeHistory as ChangeHistory;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB as DB;
use Illuminate\Support\Str;

class Dashboardcomcontroller extends Controller
{
    public function View_Dashboardcom(Request $request)
    {
        return view('page/dashboardcom', [
            'Department' => Department::get(),
            'Hotel' => Hotel::get(),
            'Window' => Window::get()
        ]);
    }

    public function Add_ItemCom(Request $request)
    {
        $check = Item::where('sticker_number', Str::upper($request->sticker_number_add))->count();
        // เช็คว่ามีข้อมูลอยู่ในระบบ หรือไม่
        if ($check == 1) {
            echo json_encode(array('ststus' => '404', 'msg' => 'มีข้อมูลอยู่ในระบบแล้ว'));
        }else {
            $Item = new Item;
            $Item->sticker_number = Str::upper($request->sticker_number_add);
            $Item->dep = $request->guest_dep_add;
            $Item->hotel = $request->guest_hotel_add;
            $Item->name = $request->guest_name_add;
            $Item->phone = $request->guest_phone_add;
            $Item->cpu = $request->cpu_add;
            $Item->ram = $request->ram_add;
            $Item->case = $request->case_add;
            $Item->monitor = $request->monitor_add;
            $Item->mouse = $request->mouse_add;
            $Item->keyboard = $request->keyboard_add;
            $Item->mainboard = $request->mainboard_add;
            $Item->powersupply = $request->powersupply_add;
            $Item->hdd = $request->hdd_add;
            $Item->ssd = $request->ssd_add;
            $Item->windows = $request->windows_add;
            $Item->teamviewer = $request->teamviwer_add;
            $Item->anydesk = $request->anydesk_add;
            $Item->computer_name = $request->computer_name_add;
            $Item->ip_main = $request->ip_main_add;
            $Item->ip_sub = $request->ip_sub_add;
            $Item->internet = $request->internet_add;
            $Item->license = $request->windows_license_add;
            $Item->username_admin = $request->username_admin_add;
            $Item->password_admin = $request->password_admin_add;
            $Item->ststus_com = 'Y';
            $Item->save();
            return json_encode(array('ststus' => '200', 'msg' => 'OK'));
        }
    }

    public function Get_ComId(Request $request)
    {
        $COM_detail = Item::where('item_id', $request->com_id)->first();
        return json_encode(array('ststus' => '200', 'data' => $COM_detail));
    }

    public function Update_ItemCom(Request $request)
    {
        $oldData = Item::where('sticker_number', $request->sticker_number_edit)->get();
        foreach ($oldData as $key => $old_row) {
            // dep
            if($old_row->dep != $request->guest_dep_edit) {
                $Item = Item::find($old_row->item_id);
                $Item->dep = $request->guest_dep_edit;
                $Item->save();
                $this->Change_Historys_Log($old_row->sticker_number, 'Guest Dep', $old_row->dep, $request->guest_dep_edit);
            }
            // hotel
            if($old_row->hotel != $request->guest_hotel_edit) {
                $Item = Item::find($old_row->item_id);
                $Item->hotel = $request->guest_hotel_edit;
                $Item->save();
                $this->Change_Historys_Log($old_row->sticker_number, 'Guest Hotel', $old_row->hotel, $request->guest_hotel_edit);
            }
            // name
            if($old_row->name != $request->guest_name_edit) {
                $Item = Item::find($old_row->item_id);
                $Item->name = $request->guest_name_edit;
                $Item->save();
                $this->Change_Historys_Log($old_row->sticker_number, 'Guest Name', $old_row->name, $request->guest_name_edit);
            }
            //phone
            if($old_row->phone != $request->guest_phone_edit) {
                $Item = Item::find($old_row->item_id);
                $Item->phone = $request->guest_phone_edit;
                $Item->save();
                $this->Change_Historys_Log($old_row->sticker_number, 'Guest Phone', $old_row->phone, $request->guest_phone_edit);
            }
            //cpu
            if($old_row->cpu != $request->cpu_edit) {
                $Item = Item::find($old_row->item_id);
                $Item->cpu = $request->cpu_edit;
                $Item->save();
                $this->Change_Historys_Log($old_row->sticker_number, 'CPU', $old_row->cpu, $request->cpu_edit);
            }           
            //ram
            if($old_row->ram != $request->ram_edit) {
                $Item = Item::find($old_row->item_id);
                $Item->ram = $request->ram_edit;
                $Item->save();
                $this->Change_Historys_Log($old_row->sticker_number, 'RAM', $old_row->ram, $request->ram_edit);
            } 
            //case
            if($old_row->case != $request->case_edit) {
                $Item = Item::find($old_row->item_id);
                $Item->case = $request->case_edit;
                $Item->save();
                $this->Change_Historys_Log($old_row->sticker_number, 'Case', $old_row->case, $request->case_edit);
            } 
            //monitor
            if($old_row->monitor != $request->monitor_edit) {
                $Item = Item::find($old_row->item_id);
                $Item->monitor = $request->monitor_edit;
                $Item->save();
                $this->Change_Historys_Log($old_row->sticker_number, 'Monitor', $old_row->monitor, $request->monitor_edit);
            } 
            //mouse
            if($old_row->mouse != $request->mouse_edit) {
                $Item = Item::find($old_row->item_id);
                $Item->mouse = $request->mouse_edit;
                $Item->save();
                $this->Change_Historys_Log($old_row->sticker_number, 'Mouse', $old_row->mouse, $request->mouse_edit);
            }
            //keyboard
            if($old_row->keyboard != $request->keyboard_edit) {
                $Item = Item::find($old_row->item_id);
                $Item->keyboard = $request->keyboard_edit;
                $Item->save();
                $this->Change_Historys_Log($old_row->sticker_number, 'Keyboard', $old_row->keyboard, $request->keyboard_edit);
            }
            //mainboard
            if($old_row->mainboard != $request->mainboard_edit) {
                $Item = Item::find($old_row->item_id);
                $Item->mainboard = $request->mainboard_edit;
                $Item->save();
                $this->Change_Historys_Log($old_row->sticker_number, 'Mainboard', $old_row->mainboard, $request->mainboard_edit);
            }
            //powersupply
            if($old_row->powersupply != $request->powersupply_edit) {
                $Item = Item::find($old_row->item_id);
                $Item->powersupply = $request->powersupply_edit;
                $Item->save();
                $this->Change_Historys_Log($old_row->sticker_number, 'PowerSupply', $old_row->powersupply, $request->powersupply_edit);
            }
            //hdd
            if($old_row->hdd != $request->hdd_edit) {
                $Item = Item::find($old_row->item_id);
                $Item->hdd = $request->hdd_edit;
                $Item->save();
                $this->Change_Historys_Log($old_row->sticker_number, 'HDD', $old_row->hdd, $request->hdd_edit);
            }
            //ssd
            if($old_row->ssd != $request->ssd_edit) {
                $Item = Item::find($old_row->item_id);
                $Item->ssd = $request->ssd_edit;
                $Item->save();
                $this->Change_Historys_Log($old_row->sticker_number, 'SSD', $old_row->ssd, $request->ssd_edit);
            }
            //windows
            if($old_row->windows != $request->windows_edit) {
                if ($request->windows_edit != '') {
                    $Item = Item::find($old_row->item_id);
                    $Item->windows = $request->windows_edit;
                    $Item->save();
                    $this->Change_Historys_Log($old_row->sticker_number, 'Windows', $old_row->windows, $request->windows_edit);
                }
            }
            //teamviewer
            if($old_row->teamviewer != $request->teamviwer_edit) {
                $Item = Item::find($old_row->item_id);
                $Item->teamviewer = $request->teamviwer_edit;
                $Item->save();
                $this->Change_Historys_Log($old_row->sticker_number, 'Teamviewer', $old_row->teamviewer, $request->teamviwer_edit);
            }
            //anydesk
            if($old_row->anydesk != $request->anydesk_edit) {
                $Item = Item::find($old_row->item_id);
                $Item->anydesk = $request->anydesk_edit;
                $Item->save();
                $this->Change_Historys_Log($old_row->sticker_number, 'Anydesk', $old_row->anydesk, $request->anydesk_edit);
            }
            //computer_name
            if($old_row->computer_name != $request->computer_name_edit) {
                $Item = Item::find($old_row->item_id);
                $Item->computer_name = $request->computer_name_edit;
                $Item->save();
                $this->Change_Historys_Log($old_row->sticker_number, 'Computer Name', $old_row->computer_name, $request->computer_name_edit);
            }
            //ip_main
            if($old_row->ip_main != $request->ip_main_edit) {
                $Item = Item::find($old_row->item_id);
                $Item->ip_main = $request->ip_main_edit;
                $Item->save();
                $this->Change_Historys_Log($old_row->sticker_number, 'IP Address Main', $old_row->ip_main, $request->ip_main_edit);
            }
            //ip_sub
            if($old_row->ip_sub != $request->ip_sub_edit) {
                $Item = Item::find($old_row->item_id);
                $Item->ip_sub = $request->ip_sub_edit;
                $Item->save();
                $this->Change_Historys_Log($old_row->sticker_number, 'IP Address Sub', $old_row->ip_sub, $request->ip_sub_edit);
            }
            //internet
            if($old_row->internet != $request->internet_edit) {
                $Item = Item::find($old_row->item_id);
                $Item->internet = $request->internet_edit;
                $Item->save();
                $this->Change_Historys_Log($old_row->sticker_number, 'Internet', $old_row->internet, $request->internet_edit);
            }
            //license
            if($old_row->license != $request->windows_license_edit) {
                $Item = Item::find($old_row->item_id);
                $Item->license = $request->windows_license_edit;
                $Item->save();
                $this->Change_Historys_Log($old_row->sticker_number, 'License', $old_row->license, $request->windows_license_edit);
            }
            //username_admin
            if($old_row->username_admin != $request->username_admin_edit) {
                $Item = Item::find($old_row->item_id);
                $Item->username_admin = $request->username_admin_edit;
                $Item->save();
                $this->Change_Historys_Log($old_row->sticker_number, 'Username_Admin', $old_row->username_admin, $request->username_admin_edit);
            }
            //password_admin
            if($old_row->password_admin != $request->password_admin_edit) {
                $Item = Item::find($old_row->item_id);
                $Item->password_admin = $request->password_admin_edit;
                $Item->save();
                $this->Change_Historys_Log($old_row->sticker_number, 'Password_Admin', $old_row->password_admin, $request->password_admin_edit);
            }

            return json_encode(array('ststus' => '200', 'msg' => 'OK'));
        }
    }

    public function Change_Historys_Log($ID_Computer, $Item_type, $old_item, $Value_add)
    {
            if ($old_item == '' OR $old_item == null) {
                $Item_ststus = "เพิ่มข้อมูลใหม่";
            }else {
                $Item_ststus = "เปลี่ยนข้อมูล";
            }
            // Insert ChangeHistory
            $ChangeHistory = new ChangeHistory;
            // Insert Sticker Number
            $ChangeHistory->sticker_number = $ID_Computer;
            // Insert Item Type
            $ChangeHistory->item_type = $Item_type;
            // Insert Item Old
            $ChangeHistory->item_old = $old_item;
            // Insert Item Change
            $ChangeHistory->item_change = $Value_add;
            // Insert Item Status
            $ChangeHistory->item_status = $Item_ststus;
            // Insert User Change 
            $ChangeHistory->users_change = Auth::user()->username;
            // Insert Save
            $ChangeHistory->save();
            return;
    }
}
