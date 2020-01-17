<?php

namespace App\Http\Controllers;

use Response;
use Carbon\Carbon;
use App\Model\Item as Item;
use App\Model\User as User;
use App\Model\ChangeHistory as ChangeHistory;
use App\Model\Department as Department;
use App\Model\Hotel as Hotel;
use App\Model\Window as Window;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB as DB;

class Viewitemcontroller extends Controller
{
    public function Load_item(Request $request, $sticker_number)
    {
        $data = DB::table('item')->where('sticker_number', $sticker_number)->get();
        return view('page/viewitem', [
                    'Item' => $data,
                    'Department' => Department::get(),
                    'Hotel' => Hotel::get(),
                    'Window' => Window::get()]);
    }

    public function Load_item_view_history(Request $request, $sticker_number)
    {
        $users = ChangeHistory::where('sticker_number', $sticker_number)->get();

        return Datatables::of($users)
        ->editColumn('remark', function($users) {
            $result = "<span style='cursor: pointer;' data-toggle='tooltip' data-placement='bottom' title='$users->remark'>".str_limit($users->remark, 25)."</span>";
            return $result;
        })
        ->editColumn('created_at', function($users) {
            $result = date("d/m/Y H:i:s",strtotime($users->created_at));
            return $result;
        })
        ->rawColumns(['remark'])
        ->make(true);
    }

    public function Update_item_view_save(Request $request)
    {
        switch ($request->post('Type_add')) {

            /**
             * Guest
             */

            // Guest Name
            case 'Guest Name':
                $id = Item::where('sticker_number', $request->post('ID_computer'))->value('item_id');
                $old_item = Item::where('sticker_number', $request->post('ID_computer'))->value('name');
                $Update = Item::find($id);
                $Update->name = $request->post('Value_add');
                $Update->save();
                $this->Change_Historys_Log($request->post('ID_computer'), $request->post('Type_add'), $request->post('Value_add'), $request->post('Item_ststus'), $old_item, $request->post('Remark'));
                return response()->json(['status' => 'success','error_text' => 'บันทึก เสร็จสิ้น รอ 1วินาที'],200);
            break;
            // Guest Dep
            case 'Guest Dep':
                $id = Item::where('sticker_number', $request->post('ID_computer'))->value('item_id');
                $old_item = Item::where('sticker_number', $request->post('ID_computer'))->value('dep');
                $Update = Item::find($id);
                $Update->dep = $request->post('Value_add');
                $Update->save();
                $this->Change_Historys_Log($request->post('ID_computer'), $request->post('Type_add'), $request->post('Value_add'), $request->post('Item_ststus'), $old_item, $request->post('Remark'));                
                return response()->json(['status' => 'success','error_text' => 'บันทึก เสร็จสิ้น รอ 1วินาที'],200);
            break;
            // Guest Hotel
            case 'Guest Hotel':
                $id = Item::where('sticker_number', $request->post('ID_computer'))->value('item_id');
                $old_item = Item::where('sticker_number', $request->post('ID_computer'))->value('hotel');
                $Update = Item::find($id);
                $Update->hotel = $request->post('Value_add');
                $Update->save();
                $this->Change_Historys_Log($request->post('ID_computer'), $request->post('Type_add'), $request->post('Value_add'), $request->post('Item_ststus'), $old_item, $request->post('Remark'));  
                return response()->json(['status' => 'success','error_text' => 'บันทึก เสร็จสิ้น รอ 1วินาที'],200);
            break;
            // Guest Phone
            case 'Guest Phone':
                $id = Item::where('sticker_number', $request->post('ID_computer'))->value('item_id');
                $old_item = Item::where('sticker_number', $request->post('ID_computer'))->value('phone');
                $Update = Item::find($id);
                $Update->phone = $request->post('Value_add');
                $Update->save();
                $this->Change_Historys_Log($request->post('ID_computer'), $request->post('Type_add'), $request->post('Value_add'), $request->post('Item_ststus'), $old_item, $request->post('Remark'));                
                return response()->json(['status' => 'success','error_text' => 'บันทึก เสร็จสิ้น รอ 1วินาที'],200);
            break;

            /**
             * Hardware
             */

            // CPU
            case 'CPU':
                $id = Item::where('sticker_number', $request->post('ID_computer'))->value('item_id');
                $old_item = Item::where('sticker_number', $request->post('ID_computer'))->value('cpu');
                $Update = Item::find($id);
                $Update->cpu = $request->post('Value_add');
                $Update->save();
                $this->Change_Historys_Log($request->post('ID_computer'), $request->post('Type_add'), $request->post('Value_add'), $request->post('Item_ststus'), $old_item, $request->post('Remark'));
                return response()->json(['status' => 'success','error_text' => 'บันทึก เสร็จสิ้น รอ 1วินาที'],200);
            break;
            // RAM
            case 'RAM':
                $id = Item::where('sticker_number', $request->post('ID_computer'))->value('item_id');
                $old_item = Item::where('sticker_number', $request->post('ID_computer'))->value('ram');
                $Update = Item::find($id);
                $Update->ram = $request->post('Value_add');
                $Update->save();
                $this->Change_Historys_Log($request->post('ID_computer'), $request->post('Type_add'), $request->post('Value_add'), $request->post('Item_ststus'), $old_item, $request->post('Remark'));
                return response()->json(['status' => 'success','error_text' => 'บันทึก เสร็จสิ้น รอ 1วินาที'],200);
            break; 
            // Case
            case 'Case':
                $id = Item::where('sticker_number', $request->post('ID_computer'))->value('item_id');
                $old_item = Item::where('sticker_number', $request->post('ID_computer'))->value('case');
                $Update = Item::find($id);
                $Update->case = $request->post('Value_add');
                $Update->save();
                $this->Change_Historys_Log($request->post('ID_computer'), $request->post('Type_add'), $request->post('Value_add'), $request->post('Item_ststus'), $old_item, $request->post('Remark'));
                return response()->json(['status' => 'success','error_text' => 'บันทึก เสร็จสิ้น รอ 1วินาที'],200);
            break;      
            // Monitor
            case 'Monitor':
                $id = Item::where('sticker_number', $request->post('ID_computer'))->value('item_id');
                $old_item = Item::where('sticker_number', $request->post('ID_computer'))->value('monitor');
                $Update = Item::find($id);
                $Update->monitor = $request->post('Value_add');
                $Update->save();
                $this->Change_Historys_Log($request->post('ID_computer'), $request->post('Type_add'), $request->post('Value_add'), $request->post('Item_ststus'), $old_item, $request->post('Remark'));
                return response()->json(['status' => 'success','error_text' => 'บันทึก เสร็จสิ้น รอ 1วินาที'],200);
            break;    
            // Mouse
            case 'Mouse':
                $id = Item::where('sticker_number', $request->post('ID_computer'))->value('item_id');
                $old_item = Item::where('sticker_number', $request->post('ID_computer'))->value('mouse');
                $Update = Item::find($id);
                $Update->mouse = $request->post('Value_add');
                $Update->save();
                $this->Change_Historys_Log($request->post('ID_computer'), $request->post('Type_add'), $request->post('Value_add'), $request->post('Item_ststus'), $old_item, $request->post('Remark'));
                return response()->json(['status' => 'success','error_text' => 'บันทึก เสร็จสิ้น รอ 1วินาที'],200);
            break;  
            // Keyboard
            case 'Keyboard':
                $id = Item::where('sticker_number', $request->post('ID_computer'))->value('item_id');
                $old_item = Item::where('sticker_number', $request->post('ID_computer'))->value('keyboard');
                $Update = Item::find($id);
                $Update->keyboard = $request->post('Value_add');
                $Update->save();
                $this->Change_Historys_Log($request->post('ID_computer'), $request->post('Type_add'), $request->post('Value_add'), $request->post('Item_ststus'), $old_item, $request->post('Remark'));
                return response()->json(['status' => 'success','error_text' => 'บันทึก เสร็จสิ้น รอ 1วินาที'],200);
            break;    
            // Mainboard
            case 'Mainboard':
                $id = Item::where('sticker_number', $request->post('ID_computer'))->value('item_id');
                $old_item = Item::where('sticker_number', $request->post('ID_computer'))->value('mainboard');
                $Update = Item::find($id);
                $Update->mainboard = $request->post('Value_add');
                $Update->save();
                $this->Change_Historys_Log($request->post('ID_computer'), $request->post('Type_add'), $request->post('Value_add'), $request->post('Item_ststus'), $old_item, $request->post('Remark'));
                return response()->json(['status' => 'success','error_text' => 'บันทึก เสร็จสิ้น รอ 1วินาที'],200);
            break; 
            // Power Supply
            case 'Power Supply':
                $id = Item::where('sticker_number', $request->post('ID_computer'))->value('item_id');
                $old_item = Item::where('sticker_number', $request->post('ID_computer'))->value('powersupply');
                $Update = Item::find($id);
                $Update->powersupply = $request->post('Value_add');
                $Update->save();
                $this->Change_Historys_Log($request->post('ID_computer'), $request->post('Type_add'), $request->post('Value_add'), $request->post('Item_ststus'), $old_item, $request->post('Remark'));
                return response()->json(['status' => 'success','error_text' => 'บันทึก เสร็จสิ้น รอ 1วินาที'],200);
            break;   
            // HDD
            case 'HDD':
                $id = Item::where('sticker_number', $request->post('ID_computer'))->value('item_id');
                $old_item = Item::where('sticker_number', $request->post('ID_computer'))->value('hdd');
                $Update = Item::find($id);
                $Update->hdd = $request->post('Value_add');
                $Update->save();
                $this->Change_Historys_Log($request->post('ID_computer'), $request->post('Type_add'), $request->post('Value_add'), $request->post('Item_ststus'), $old_item, $request->post('Remark'));
                return response()->json(['status' => 'success','error_text' => 'บันทึก เสร็จสิ้น รอ 1วินาที'],200);
            break;  
            // HDD
            case 'SSD':
                $id = Item::where('sticker_number', $request->post('ID_computer'))->value('item_id');
                $old_item = Item::where('sticker_number', $request->post('ID_computer'))->value('ssd');
                $Update = Item::find($id);
                $Update->ssd = $request->post('Value_add');
                $Update->save();
                $this->Change_Historys_Log($request->post('ID_computer'), $request->post('Type_add'), $request->post('Value_add'), $request->post('Item_ststus'), $old_item, $request->post('Remark'));
                return response()->json(['status' => 'success','error_text' => 'บันทึก เสร็จสิ้น รอ 1วินาที'],200);
            break;    
            // UPS
            case 'UPS':
                $id = Item::where('sticker_number', $request->post('ID_computer'))->value('item_id');
                $old_item = Item::where('sticker_number', $request->post('ID_computer'))->value('ups');
                $Update = Item::find($id);
                $Update->ups = $request->post('Value_add');
                $Update->save();
                $this->Change_Historys_Log($request->post('ID_computer'), $request->post('Type_add'), $request->post('Value_add'), $request->post('Item_ststus'), $old_item, $request->post('Remark'));
                return response()->json(['status' => 'success','error_text' => 'บันทึก เสร็จสิ้น รอ 1วินาที'],200);
            break;  
            // UPS Battery
            case 'UPS Battery':
                $id = Item::where('sticker_number', $request->post('ID_computer'))->value('item_id');
                $old_item = Item::where('sticker_number', $request->post('ID_computer'))->value('ups_battery');
                $Update = Item::find($id);
                $Update->ups_battery = $request->post('Value_add');
                $Update->save();
                $this->Change_Historys_Log($request->post('ID_computer'), $request->post('Type_add'), $request->post('Value_add'), $request->post('Item_ststus'), $old_item, $request->post('Remark'));
                return response()->json(['status' => 'success','error_text' => 'บันทึก เสร็จสิ้น รอ 1วินาที'],200);
            break;
            
            /**
             * Software
             */

            // Teamviewer
            case 'Teamviewer':
                $id = Item::where('sticker_number', $request->post('ID_computer'))->value('item_id');
                $old_item = Item::where('sticker_number', $request->post('ID_computer'))->value('teamviewer');
                $Update = Item::find($id);
                $Update->teamviewer = str_replace(" ", "", $request->post('Value_add'));
                $Update->save();
                $this->Change_Historys_Log($request->post('ID_computer'), $request->post('Type_add'), str_replace(" ", "", $request->post('Value_add')), $request->post('Item_ststus'), $old_item, $request->post('Remark'));
                return response()->json(['status' => 'success','error_text' => 'บันทึก เสร็จสิ้น รอ 1วินาที'],200);
            break; 
            // Anydesk
            case 'Anydesk':
                $id = Item::where('sticker_number', $request->post('ID_computer'))->value('item_id');
                $old_item = Item::where('sticker_number', $request->post('ID_computer'))->value('anydesk');
                $Update = Item::find($id);
                $Update->anydesk = str_replace(" ", "", $request->post('Value_add'));
                $Update->save();
                $this->Change_Historys_Log($request->post('ID_computer'), $request->post('Type_add'), str_replace(" ", "", $request->post('Value_add')), $request->post('Item_ststus'), $old_item, $request->post('Remark'));
                return response()->json(['status' => 'success','error_text' => 'บันทึก เสร็จสิ้น รอ 1วินาที'],200);
            break; 
            // Username_Admin
            case 'Username_Admin':
                $id = Item::where('sticker_number', $request->post('ID_computer'))->value('item_id');
                $old_item = Item::where('sticker_number', $request->post('ID_computer'))->value('username_admin');
                $Update = Item::find($id);
                $Update->username_admin = str_replace(" ", "", $request->post('Value_add'));
                $Update->save();
                $this->Change_Historys_Log($request->post('ID_computer'), $request->post('Type_add'), str_replace(" ", "", $request->post('Value_add')), $request->post('Item_ststus'), $old_item, $request->post('Remark'));
                return response()->json(['status' => 'success','error_text' => 'บันทึก เสร็จสิ้น รอ 1วินาที'],200);
            break; 
            // Password_Admin
            case 'Password_Admin':
                $id = Item::where('sticker_number', $request->post('ID_computer'))->value('item_id');
                $old_item = Item::where('sticker_number', $request->post('ID_computer'))->value('password_admin');
                $Update = Item::find($id);
                $Update->password_admin = str_replace(" ", "", $request->post('Value_add'));
                $Update->save();
                $this->Change_Historys_Log($request->post('ID_computer'), $request->post('Type_add'), str_replace(" ", "", $request->post('Value_add')), $request->post('Item_ststus'), $old_item, $request->post('Remark'));
                return response()->json(['status' => 'success','error_text' => 'บันทึก เสร็จสิ้น รอ 1วินาที'],200);
            break; 

            /**
             * System
             */

            // Windows
            case 'Windows':
                $id = Item::where('sticker_number', $request->post('ID_computer'))->value('item_id');
                $old_item = Item::where('sticker_number', $request->post('ID_computer'))->value('windows');
                $Update = Item::find($id);
                $Update->windows = $request->post('Value_add');
                $Update->save();
                $this->Change_Historys_Log($request->post('ID_computer'), $request->post('Type_add'), $request->post('Value_add'), $request->post('Item_ststus'), $old_item, $request->post('Remark'));
                return response()->json(['status' => 'success','error_text' => 'บันทึก เสร็จสิ้น รอ 1วินาที'],200);
            break; 
            // License
            case 'License':
                $id = Item::where('sticker_number', $request->post('ID_computer'))->value('item_id');
                $old_item = Item::where('sticker_number', $request->post('ID_computer'))->value('license');
                $Update = Item::find($id);
                $Update->license = $request->post('Value_add');
                $Update->save();
                $this->Change_Historys_Log($request->post('ID_computer'), $request->post('Type_add'), $request->post('Value_add'), $request->post('Item_ststus'), $old_item, $request->post('Remark'));
                return response()->json(['status' => 'success','error_text' => 'บันทึก เสร็จสิ้น รอ 1วินาที'],200);
            break; 
            // Computer Name
            case 'Computer Name':
                $id = Item::where('sticker_number', $request->post('ID_computer'))->value('item_id');
                $old_item = Item::where('sticker_number', $request->post('ID_computer'))->value('computer_name');
                $Update = Item::find($id);
                $Update->computer_name = $request->post('Value_add');
                $Update->save();
                $this->Change_Historys_Log($request->post('ID_computer'), $request->post('Type_add'), $request->post('Value_add'), $request->post('Item_ststus'), $old_item, $request->post('Remark'));
                return response()->json(['status' => 'success','error_text' => 'บันทึก เสร็จสิ้น รอ 1วินาที'],200);
            break; 
            // IP Address Main
            case 'IP Address Main':
                $id = Item::where('sticker_number', $request->post('ID_computer'))->value('item_id');
                $old_item = Item::where('sticker_number', $request->post('ID_computer'))->value('ip_main');
                $Update = Item::find($id);
                $Update->ip_main = $request->post('Value_add');
                $Update->save();
                $this->Change_Historys_Log($request->post('ID_computer'), $request->post('Type_add'), $request->post('Value_add'), $request->post('Item_ststus'), $old_item, $request->post('Remark'));
                return response()->json(['status' => 'success','error_text' => 'บันทึก เสร็จสิ้น รอ 1วินาที'],200);
            break; 
            // IP Address Sub
            case 'IP Address Sub':
                $id = Item::where('sticker_number', $request->post('ID_computer'))->value('item_id');
                $old_item = Item::where('sticker_number', $request->post('ID_computer'))->value('ip_sub');
                $Update = Item::find($id);
                $Update->ip_sub = $request->post('Value_add');
                $Update->save();
                $this->Change_Historys_Log($request->post('ID_computer'), $request->post('Type_add'), $request->post('Value_add'), $request->post('Item_ststus'), $old_item, $request->post('Remark'));
                return response()->json(['status' => 'success','error_text' => 'บันทึก เสร็จสิ้น รอ 1วินาที'],200);
            break; 
            // Internet
            case 'Internet':
                $id = Item::where('sticker_number', $request->post('ID_computer'))->value('item_id');
                $old_item = Item::where('sticker_number', $request->post('ID_computer'))->value('internet');
                $Update = Item::find($id);
                $Update->internet = $request->post('Value_add');
                $Update->save();
                $this->Change_Historys_Log($request->post('ID_computer'), $request->post('Type_add'), $request->post('Value_add'), $request->post('Item_ststus'), $old_item, $request->post('Remark'));
                return response()->json(['status' => 'success','error_text' => 'บันทึก เสร็จสิ้น รอ 1วินาที'],200);
            break; 
        }
    }

    public function Change_Historys_Log($ID_Computer, $Item_type, $Value_add, $Item_ststus, $old_item, $Remark)
    {
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
            // Insert Item Remark
            $ChangeHistory->remark = $Remark;
            // Insert User Change 
            $ChangeHistory->users_change = Auth::user()->username;
            // Insert Save
            $ChangeHistory->save();
            return;
    }

}
