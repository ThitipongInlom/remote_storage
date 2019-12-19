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
                $Guest = Item::where('sticker_number', $request->post('ID_computer'))->get();
                $id = $Guest[0]->item_id;
                $old_item = $Guest[0]->name;
                $Guest = Item::find($id);
                $Guest->name = $request->post('Value_add');
                $Guest->save();
                $this->Change_Historys_Log($request->post('ID_computer'), $request->post('Type_add'), $request->post('Value_add'), $request->post('Item_ststus'), $old_item, $request->post('Remark'));
                return Response::json(array('status' => 'success','error_text' => 'บันทึก เสร็จสิ้น รอ 3วินาที'),200);
            break;
            // Guest Dep
            case 'Guest Dep':
                $Guest = Item::where('sticker_number', $request->post('ID_computer'))->get();
                $id = $Guest[0]->item_id;
                $old_item = $Guest[0]->dep;
                $Guest = Item::find($id);
                $Guest->dep = $request->post('Value_add');
                $Guest->save();
                $this->Change_Historys_Log($request->post('ID_computer'), $request->post('Type_add'), $request->post('Value_add'), $request->post('Item_ststus'), $old_item, $request->post('Remark'));                
                return Response::json(array('status' => 'success','error_text' => 'บันทึก เสร็จสิ้น รอ 3วินาที'),200);
            break;
            // Guest Hotel
            case 'Guest Hotel':
                $Guest = Item::where('sticker_number', $request->post('ID_computer'))->get();
                $id = $Guest[0]->item_id;
                $old_item = $Guest[0]->hotel;
                $Guest = Item::find($id);
                $Guest->hotel = $request->post('Value_add');
                $Guest->save();
                $this->Change_Historys_Log($request->post('ID_computer'), $request->post('Type_add'), $request->post('Value_add'), $request->post('Item_ststus'), $old_item, $request->post('Remark'));  
                return Response::json(array('status' => 'success','error_text' => 'บันทึก เสร็จสิ้น รอ 3วินาที'),200);
            break;
            // Guest Phone
            case 'Guest Phone':
                $Guest = Item::where('sticker_number', $request->post('ID_computer'))->get();
                $id = $Guest[0]->item_id;
                $old_item = $Guest[0]->phone;
                $Guest = Item::find($id);
                $Guest->phone = $request->post('Value_add');
                $Guest->save();
                $this->Change_Historys_Log($request->post('ID_computer'), $request->post('Type_add'), $request->post('Value_add'), $request->post('Item_ststus'), $old_item, $request->post('Remark'));                
                return Response::json(array('status' => 'success','error_text' => 'บันทึก เสร็จสิ้น รอ 3วินาที'),200);
            break;

            /**
             * Hardware
             */

            // CPU
            case 'CPU':
                $Hardware = Item::where('sticker_number', $request->post('ID_computer'))->get();
                $id = $Hardware[0]->item_id;
                $old_item = $Hardware[0]->cpu;
                $Hardware = Item::find($id);
                $Hardware->cpu = $request->post('Value_add');
                $Hardware->save();
                $this->Change_Historys_Log($request->post('ID_computer'), $request->post('Type_add'), $request->post('Value_add'), $request->post('Item_ststus'), $old_item, $request->post('Remark'));
                return Response::json(array('status' => 'success','error_text' => 'บันทึก เสร็จสิ้น รอ 3วินาที'),200);
            break;
            // RAM
            case 'RAM':
                $Hardware = Item::where('sticker_number', $request->post('ID_computer'))->get();
                $id = $Hardware[0]->item_id;
                $old_item = $Hardware[0]->ram;
                $Hardware = Item::find($id);
                $Hardware->ram = $request->post('Value_add');
                $Hardware->save();
                $this->Change_Historys_Log($request->post('ID_computer'), $request->post('Type_add'), $request->post('Value_add'), $request->post('Item_ststus'), $old_item, $request->post('Remark'));
                return Response::json(array('status' => 'success','error_text' => 'บันทึก เสร็จสิ้น รอ 3วินาที'),200);
            break; 
            // Case
            case 'Case':
                $Hardware = Item::where('sticker_number', $request->post('ID_computer'))->get();
                $id = $Hardware[0]->item_id;
                $old_item = $Hardware[0]->case;
                $Hardware = Item::find($id);
                $Hardware->case = $request->post('Value_add');
                $Hardware->save();
                $this->Change_Historys_Log($request->post('ID_computer'), $request->post('Type_add'), $request->post('Value_add'), $request->post('Item_ststus'), $old_item, $request->post('Remark'));
                return Response::json(array('status' => 'success','error_text' => 'บันทึก เสร็จสิ้น รอ 3วินาที'),200);
            break;      
            // Monitor
            case 'Monitor':
                $Hardware = Item::where('sticker_number', $request->post('ID_computer'))->get();
                $id = $Hardware[0]->item_id;
                $old_item = $Hardware[0]->monitor;
                $Hardware = Item::find($id);
                $Hardware->monitor = $request->post('Value_add');
                $Hardware->save();
                $this->Change_Historys_Log($request->post('ID_computer'), $request->post('Type_add'), $request->post('Value_add'), $request->post('Item_ststus'), $old_item, $request->post('Remark'));
                return Response::json(array('status' => 'success','error_text' => 'บันทึก เสร็จสิ้น รอ 3วินาที'),200);
            break;    
            // Mouse
            case 'Mouse':
                $Hardware = Item::where('sticker_number', $request->post('ID_computer'))->get();
                $id = $Hardware[0]->item_id;
                $old_item = $Hardware[0]->mouse;
                $Hardware = Item::find($id);
                $Hardware->mouse = $request->post('Value_add');
                $Hardware->save();
                $this->Change_Historys_Log($request->post('ID_computer'), $request->post('Type_add'), $request->post('Value_add'), $request->post('Item_ststus'), $old_item, $request->post('Remark'));
                return Response::json(array('status' => 'success','error_text' => 'บันทึก เสร็จสิ้น รอ 3วินาที'),200);
            break;  
            // Keyboard
            case 'Keyboard':
                $Hardware = Item::where('sticker_number', $request->post('ID_computer'))->get();
                $id = $Hardware[0]->item_id;
                $old_item = $Hardware[0]->keyboard;
                $Hardware = Item::find($id);
                $Hardware->keyboard = $request->post('Value_add');
                $Hardware->save();
                $this->Change_Historys_Log($request->post('ID_computer'), $request->post('Type_add'), $request->post('Value_add'), $request->post('Item_ststus'), $old_item, $request->post('Remark'));
                return Response::json(array('status' => 'success','error_text' => 'บันทึก เสร็จสิ้น รอ 3วินาที'),200);
            break;    
            // Mainboard
            case 'Mainboard':
                $Hardware = Item::where('sticker_number', $request->post('ID_computer'))->get();
                $id = $Hardware[0]->item_id;
                $old_item = $Hardware[0]->mainboard;
                $Hardware = Item::find($id);
                $Hardware->mainboard = $request->post('Value_add');
                $Hardware->save();
                $this->Change_Historys_Log($request->post('ID_computer'), $request->post('Type_add'), $request->post('Value_add'), $request->post('Item_ststus'), $old_item, $request->post('Remark'));
                return Response::json(array('status' => 'success','error_text' => 'บันทึก เสร็จสิ้น รอ 3วินาที'),200);
            break; 
            // Power Supply
            case 'Power Supply':
                $Hardware = Item::where('sticker_number', $request->post('ID_computer'))->get();
                $id = $Hardware[0]->item_id;
                $old_item = $Hardware[0]->powersupply;
                $Hardware = Item::find($id);
                $Hardware->powersupply = $request->post('Value_add');
                $Hardware->save();
                $this->Change_Historys_Log($request->post('ID_computer'), $request->post('Type_add'), $request->post('Value_add'), $request->post('Item_ststus'), $old_item, $request->post('Remark'));
                return Response::json(array('status' => 'success','error_text' => 'บันทึก เสร็จสิ้น รอ 3วินาที'),200);
            break;   
            // HDD
            case 'HDD':
                $Hardware = Item::where('sticker_number', $request->post('ID_computer'))->get();
                $id = $Hardware[0]->item_id;
                $old_item = $Hardware[0]->hdd;
                $Hardware = Item::find($id);
                $Hardware->hdd = $request->post('Value_add');
                $Hardware->save();
                $this->Change_Historys_Log($request->post('ID_computer'), $request->post('Type_add'), $request->post('Value_add'), $request->post('Item_ststus'), $old_item, $request->post('Remark'));
                return Response::json(array('status' => 'success','error_text' => 'บันทึก เสร็จสิ้น รอ 3วินาที'),200);
            break;  
            // HDD
            case 'SSD':
                $Hardware = Item::where('sticker_number', $request->post('ID_computer'))->get();
                $id = $Hardware[0]->item_id;
                $old_item = $Hardware[0]->ssd;
                $Hardware = Item::find($id);
                $Hardware->ssd = $request->post('Value_add');
                $Hardware->save();
                $this->Change_Historys_Log($request->post('ID_computer'), $request->post('Type_add'), $request->post('Value_add'), $request->post('Item_ststus'), $old_item, $request->post('Remark'));
                return Response::json(array('status' => 'success','error_text' => 'บันทึก เสร็จสิ้น รอ 3วินาที'),200);
            break;    
            // UPS
            case 'UPS':
                $Hardware = Item::where('sticker_number', $request->post('ID_computer'))->get();
                $id = $Hardware[0]->item_id;
                $old_item = $Hardware[0]->ups;
                $Hardware = Item::find($id);
                $Hardware->ups = $request->post('Value_add');
                $Hardware->save();
                $this->Change_Historys_Log($request->post('ID_computer'), $request->post('Type_add'), $request->post('Value_add'), $request->post('Item_ststus'), $old_item, $request->post('Remark'));
                return Response::json(array('status' => 'success','error_text' => 'บันทึก เสร็จสิ้น รอ 3วินาที'),200);
            break;  
            // UPS Battery
            case 'UPS Battery':
                $Hardware = Item::where('sticker_number', $request->post('ID_computer'))->get();
                $id = $Hardware[0]->item_id;
                $old_item = $Hardware[0]->ups_battery;
                $Hardware = Item::find($id);
                $Hardware->ups_battery = $request->post('Value_add');
                $Hardware->save();
                $this->Change_Historys_Log($request->post('ID_computer'), $request->post('Type_add'), $request->post('Value_add'), $request->post('Item_ststus'), $old_item, $request->post('Remark'));
                return Response::json(array('status' => 'success','error_text' => 'บันทึก เสร็จสิ้น รอ 3วินาที'),200);
            break;
            
            /**
             * Software
             */

            // Teamviewer
            case 'Teamviewer':
                $Software = Item::where('sticker_number', $request->post('ID_computer'))->get();
                $id = $Software[0]->item_id;
                $old_item = $Software[0]->teamviewer;
                $Software = Item::find($id);
                $Software->teamviewer = str_replace(" ", "", $request->post('Value_add'));
                $Software->save();
                $this->Change_Historys_Log($request->post('ID_computer'), $request->post('Type_add'), str_replace(" ", "", $request->post('Value_add')), $request->post('Item_ststus'), $old_item, $request->post('Remark'));
                return Response::json(array('status' => 'success','error_text' => 'บันทึก เสร็จสิ้น รอ 3วินาที'),200);
            break; 
            // Anydesk
            case 'Anydesk':
                $Software = Item::where('sticker_number', $request->post('ID_computer'))->get();
                $id = $Software[0]->item_id;
                $old_item = $Software[0]->anydesk;
                $Software = Item::find($id);
                $Software->anydesk = str_replace(" ", "", $request->post('Value_add'));
                $Software->save();
                $this->Change_Historys_Log($request->post('ID_computer'), $request->post('Type_add'), str_replace(" ", "", $request->post('Value_add')), $request->post('Item_ststus'), $old_item, $request->post('Remark'));
                return Response::json(array('status' => 'success','error_text' => 'บันทึก เสร็จสิ้น รอ 3วินาที'),200);
            break; 
            // Username_Admin
            case 'Username_Admin':
                $Software = Item::where('sticker_number', $request->post('ID_computer'))->get();
                $id = $Software[0]->item_id;
                $old_item = $Software[0]->username_admin;
                $Software = Item::find($id);
                $Software->username_admin = str_replace(" ", "", $request->post('Value_add'));
                $Software->save();
                $this->Change_Historys_Log($request->post('ID_computer'), $request->post('Type_add'), str_replace(" ", "", $request->post('Value_add')), $request->post('Item_ststus'), $old_item, $request->post('Remark'));
                return Response::json(array('status' => 'success','error_text' => 'บันทึก เสร็จสิ้น รอ 3วินาที'),200);
            break; 
            // Password_Admin
            case 'Password_Admin':
                $Software = Item::where('sticker_number', $request->post('ID_computer'))->get();
                $id = $Software[0]->item_id;
                $old_item = $Software[0]->password_admin;
                $Software = Item::find($id);
                $Software->password_admin = str_replace(" ", "", $request->post('Value_add'));
                $Software->save();
                $this->Change_Historys_Log($request->post('ID_computer'), $request->post('Type_add'), str_replace(" ", "", $request->post('Value_add')), $request->post('Item_ststus'), $old_item, $request->post('Remark'));
                return Response::json(array('status' => 'success','error_text' => 'บันทึก เสร็จสิ้น รอ 3วินาที'),200);
            break; 

            /**
             * System
             */

            // Windows
            case 'Windows':
                $System = Item::where('sticker_number', $request->post('ID_computer'))->get();
                $id = $System[0]->item_id;
                $old_item = $System[0]->windows;
                $System = Item::find($id);
                $System->windows = $request->post('Value_add');
                $System->save();
                $this->Change_Historys_Log($request->post('ID_computer'), $request->post('Type_add'), $request->post('Value_add'), $request->post('Item_ststus'), $old_item, $request->post('Remark'));
                return Response::json(array('status' => 'success','error_text' => 'บันทึก เสร็จสิ้น รอ 3วินาที'),200);
            break; 
            // License
            case 'License':
                $System = Item::where('sticker_number', $request->post('ID_computer'))->get();
                $id = $System[0]->item_id;
                $old_item = $System[0]->license;
                $System = Item::find($id);
                $System->license = $request->post('Value_add');
                $System->save();
                $this->Change_Historys_Log($request->post('ID_computer'), $request->post('Type_add'), $request->post('Value_add'), $request->post('Item_ststus'), $old_item, $request->post('Remark'));
                return Response::json(array('status' => 'success','error_text' => 'บันทึก เสร็จสิ้น รอ 3วินาที'),200);
            break; 
            // Computer Name
            case 'Computer Name':
                $System = Item::where('sticker_number', $request->post('ID_computer'))->get();
                $id = $System[0]->item_id;
                $old_item = $System[0]->computer_name;
                $System = Item::find($id);
                $System->computer_name = $request->post('Value_add');
                $System->save();
                $this->Change_Historys_Log($request->post('ID_computer'), $request->post('Type_add'), $request->post('Value_add'), $request->post('Item_ststus'), $old_item, $request->post('Remark'));
                return Response::json(array('status' => 'success','error_text' => 'บันทึก เสร็จสิ้น รอ 3วินาที'),200);
            break; 
            // IP Address Main
            case 'IP Address Main':
                $System = Item::where('sticker_number', $request->post('ID_computer'))->get();
                $id = $System[0]->item_id;
                $old_item = $System[0]->ip_main;
                $System = Item::find($id);
                $System->ip_main = $request->post('Value_add');
                $System->save();
                $this->Change_Historys_Log($request->post('ID_computer'), $request->post('Type_add'), $request->post('Value_add'), $request->post('Item_ststus'), $old_item, $request->post('Remark'));
                return Response::json(array('status' => 'success','error_text' => 'บันทึก เสร็จสิ้น รอ 3วินาที'),200);
            break; 
            // IP Address Sub
            case 'IP Address Sub':
                $System = Item::where('sticker_number', $request->post('ID_computer'))->get();
                $id = $System[0]->item_id;
                $old_item = $System[0]->ip_sub;
                $System = Item::find($id);
                $System->ip_sub = $request->post('Value_add');
                $System->save();
                $this->Change_Historys_Log($request->post('ID_computer'), $request->post('Type_add'), $request->post('Value_add'), $request->post('Item_ststus'), $old_item, $request->post('Remark'));
                return Response::json(array('status' => 'success','error_text' => 'บันทึก เสร็จสิ้น รอ 3วินาที'),200);
            break; 
            // Internet
            case 'Internet':
                $System = Item::where('sticker_number', $request->post('ID_computer'))->get();
                $id = $System[0]->item_id;
                $old_item = $System[0]->internet;
                $System = Item::find($id);
                $System->internet = $request->post('Value_add');
                $System->save();
                $this->Change_Historys_Log($request->post('ID_computer'), $request->post('Type_add'), $request->post('Value_add'), $request->post('Item_ststus'), $old_item, $request->post('Remark'));
                return Response::json(array('status' => 'success','error_text' => 'บันทึก เสร็จสิ้น รอ 3วินาที'),200);
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
