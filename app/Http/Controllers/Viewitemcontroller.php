<?php

namespace App\Http\Controllers;

use Response;
use Carbon\Carbon;
use App\Model\User as User;
use App\Model\System as System;
use App\Model\Software as Software;
use App\Model\Runcomputer as Runcomputer;
use App\Model\Hardware as Hardware;
use App\Model\Guest as Guest;
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
        $data = DB::table('runcomputers')
                ->join('hardwares', 'runcomputers.sticker_number', '=', 'hardwares.sticker_number')
                ->join('softwares', 'runcomputers.sticker_number', '=', 'softwares.sticker_number')
                ->join('systems', 'runcomputers.sticker_number', '=', 'systems.sticker_number')
                ->join('guests', 'runcomputers.sticker_number', '=', 'guests.sticker_number')
                ->where('runcomputers.sticker_number', $sticker_number)
                ->get();
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
                $Guest = Guest::where('sticker_number', $request->post('ID_computer'))->get();
                $id = $Guest[0]->guests_id;
                $old_item = $Guest[0]->guest_name;
                $Guest = Guest::find($id);
                $Guest->guest_name = $request->post('Value_add');
                $Guest->save();
                $this->Change_Historys_Log($request->post('ID_computer'), $request->post('Type_add'), $request->post('Value_add'), $request->post('Item_ststus'), $old_item, $request->post('Remark'));
                return Response::json(array('status' => 'success','error_text' => 'บันทึก เสร็จสิ้น รอ 3วินาที'),200);
            break;
            // Guest Dep
            case 'Guest Dep':
                $Guest = Guest::where('sticker_number', $request->post('ID_computer'))->get();
                $id = $Guest[0]->guests_id;
                $old_item = $Guest[0]->guest_dep;
                $Guest = Guest::find($id);
                $Guest->guest_dep = $request->post('Value_add');
                $Guest->save();
                $this->Change_Historys_Log($request->post('ID_computer'), $request->post('Type_add'), $request->post('Value_add'), $request->post('Item_ststus'), $old_item, $request->post('Remark'));                
                return Response::json(array('status' => 'success','error_text' => 'บันทึก เสร็จสิ้น รอ 3วินาที'),200);
            break;
            // Guest Hotel
            case 'Guest Hotel':
                $Guest = Guest::where('sticker_number', $request->post('ID_computer'))->get();
                $id = $Guest[0]->guests_id;
                $old_item = $Guest[0]->guest_hotel;
                $Guest = Guest::find($id);
                $Guest->guest_hotel = $request->post('Value_add');
                $Guest->save();
                $this->Change_Historys_Log($request->post('ID_computer'), $request->post('Type_add'), $request->post('Value_add'), $request->post('Item_ststus'), $old_item, $request->post('Remark'));  
                return Response::json(array('status' => 'success','error_text' => 'บันทึก เสร็จสิ้น รอ 3วินาที'),200);
            break;
            // Guest Phone
            case 'Guest Phone':
                $Guest = Guest::where('sticker_number', $request->post('ID_computer'))->get();
                $id = $Guest[0]->guests_id;
                $old_item = $Guest[0]->guest_phone;
                $Guest = Guest::find($id);
                $Guest->guest_phone = $request->post('Value_add');
                $Guest->save();
                $this->Change_Historys_Log($request->post('ID_computer'), $request->post('Type_add'), $request->post('Value_add'), $request->post('Item_ststus'), $old_item, $request->post('Remark'));                
                return Response::json(array('status' => 'success','error_text' => 'บันทึก เสร็จสิ้น รอ 3วินาที'),200);
            break;

            /**
             * Hardware
             */

            // CPU
            case 'CPU':
                $Hardware = Hardware::where('sticker_number', $request->post('ID_computer'))->get();
                $id = $Hardware[0]->hardware_id;
                $old_item = $Hardware[0]->cpu;
                $Hardware = Hardware::find($id);
                $Hardware->cpu = $request->post('Value_add');
                $Hardware->save();
                $this->Change_Historys_Log($request->post('ID_computer'), $request->post('Type_add'), $request->post('Value_add'), $request->post('Item_ststus'), $old_item, $request->post('Remark'));
                return Response::json(array('status' => 'success','error_text' => 'บันทึก เสร็จสิ้น รอ 3วินาที'),200);
            break;
            // RAM
            case 'RAM':
                $Hardware = Hardware::where('sticker_number', $request->post('ID_computer'))->get();
                $id = $Hardware[0]->hardware_id;
                $old_item = $Hardware[0]->ram;
                $Hardware = Hardware::find($id);
                $Hardware->ram = $request->post('Value_add');
                $Hardware->save();
                $this->Change_Historys_Log($request->post('ID_computer'), $request->post('Type_add'), $request->post('Value_add'), $request->post('Item_ststus'), $old_item, $request->post('Remark'));
                return Response::json(array('status' => 'success','error_text' => 'บันทึก เสร็จสิ้น รอ 3วินาที'),200);
            break; 
            // Case
            case 'Case':
                $Hardware = Hardware::where('sticker_number', $request->post('ID_computer'))->get();
                $id = $Hardware[0]->hardware_id;
                $old_item = $Hardware[0]->case;
                $Hardware = Hardware::find($id);
                $Hardware->case = $request->post('Value_add');
                $Hardware->save();
                $this->Change_Historys_Log($request->post('ID_computer'), $request->post('Type_add'), $request->post('Value_add'), $request->post('Item_ststus'), $old_item, $request->post('Remark'));
                return Response::json(array('status' => 'success','error_text' => 'บันทึก เสร็จสิ้น รอ 3วินาที'),200);
            break;      
            // Monitor
            case 'Monitor':
                $Hardware = Hardware::where('sticker_number', $request->post('ID_computer'))->get();
                $id = $Hardware[0]->hardware_id;
                $old_item = $Hardware[0]->monitor;
                $Hardware = Hardware::find($id);
                $Hardware->monitor = $request->post('Value_add');
                $Hardware->save();
                $this->Change_Historys_Log($request->post('ID_computer'), $request->post('Type_add'), $request->post('Value_add'), $request->post('Item_ststus'), $old_item, $request->post('Remark'));
                return Response::json(array('status' => 'success','error_text' => 'บันทึก เสร็จสิ้น รอ 3วินาที'),200);
            break;    
            // Mouse
            case 'Mouse':
                $Hardware = Hardware::where('sticker_number', $request->post('ID_computer'))->get();
                $id = $Hardware[0]->hardware_id;
                $old_item = $Hardware[0]->mouse;
                $Hardware = Hardware::find($id);
                $Hardware->mouse = $request->post('Value_add');
                $Hardware->save();
                $this->Change_Historys_Log($request->post('ID_computer'), $request->post('Type_add'), $request->post('Value_add'), $request->post('Item_ststus'), $old_item, $request->post('Remark'));
                return Response::json(array('status' => 'success','error_text' => 'บันทึก เสร็จสิ้น รอ 3วินาที'),200);
            break;  
            // Keyboard
            case 'Keyboard':
                $Hardware = Hardware::where('sticker_number', $request->post('ID_computer'))->get();
                $id = $Hardware[0]->hardware_id;
                $old_item = $Hardware[0]->keyboard;
                $Hardware = Hardware::find($id);
                $Hardware->keyboard = $request->post('Value_add');
                $Hardware->save();
                $this->Change_Historys_Log($request->post('ID_computer'), $request->post('Type_add'), $request->post('Value_add'), $request->post('Item_ststus'), $old_item, $request->post('Remark'));
                return Response::json(array('status' => 'success','error_text' => 'บันทึก เสร็จสิ้น รอ 3วินาที'),200);
            break;    
            // Mainboard
            case 'Mainboard':
                $Hardware = Hardware::where('sticker_number', $request->post('ID_computer'))->get();
                $id = $Hardware[0]->hardware_id;
                $old_item = $Hardware[0]->mainboard;
                $Hardware = Hardware::find($id);
                $Hardware->mainboard = $request->post('Value_add');
                $Hardware->save();
                $this->Change_Historys_Log($request->post('ID_computer'), $request->post('Type_add'), $request->post('Value_add'), $request->post('Item_ststus'), $old_item, $request->post('Remark'));
                return Response::json(array('status' => 'success','error_text' => 'บันทึก เสร็จสิ้น รอ 3วินาที'),200);
            break; 
            // Power Supply
            case 'Power Supply':
                $Hardware = Hardware::where('sticker_number', $request->post('ID_computer'))->get();
                $id = $Hardware[0]->hardware_id;
                $old_item = $Hardware[0]->powersupply;
                $Hardware = Hardware::find($id);
                $Hardware->powersupply = $request->post('Value_add');
                $Hardware->save();
                $this->Change_Historys_Log($request->post('ID_computer'), $request->post('Type_add'), $request->post('Value_add'), $request->post('Item_ststus'), $old_item, $request->post('Remark'));
                return Response::json(array('status' => 'success','error_text' => 'บันทึก เสร็จสิ้น รอ 3วินาที'),200);
            break;   
            // HDD
            case 'HDD':
                $Hardware = Hardware::where('sticker_number', $request->post('ID_computer'))->get();
                $id = $Hardware[0]->hardware_id;
                $old_item = $Hardware[0]->hdd;
                $Hardware = Hardware::find($id);
                $Hardware->hdd = $request->post('Value_add');
                $Hardware->save();
                $this->Change_Historys_Log($request->post('ID_computer'), $request->post('Type_add'), $request->post('Value_add'), $request->post('Item_ststus'), $old_item, $request->post('Remark'));
                return Response::json(array('status' => 'success','error_text' => 'บันทึก เสร็จสิ้น รอ 3วินาที'),200);
            break;  
            // HDD
            case 'SSD':
                $Hardware = Hardware::where('sticker_number', $request->post('ID_computer'))->get();
                $id = $Hardware[0]->hardware_id;
                $old_item = $Hardware[0]->ssd;
                $Hardware = Hardware::find($id);
                $Hardware->ssd = $request->post('Value_add');
                $Hardware->save();
                $this->Change_Historys_Log($request->post('ID_computer'), $request->post('Type_add'), $request->post('Value_add'), $request->post('Item_ststus'), $old_item, $request->post('Remark'));
                return Response::json(array('status' => 'success','error_text' => 'บันทึก เสร็จสิ้น รอ 3วินาที'),200);
            break;    
            // UPS
            case 'UPS':
                $Hardware = Hardware::where('sticker_number', $request->post('ID_computer'))->get();
                $id = $Hardware[0]->hardware_id;
                $old_item = $Hardware[0]->ups;
                $Hardware = Hardware::find($id);
                $Hardware->ups = $request->post('Value_add');
                $Hardware->save();
                $this->Change_Historys_Log($request->post('ID_computer'), $request->post('Type_add'), $request->post('Value_add'), $request->post('Item_ststus'), $old_item, $request->post('Remark'));
                return Response::json(array('status' => 'success','error_text' => 'บันทึก เสร็จสิ้น รอ 3วินาที'),200);
            break;  
            // UPS Battery
            case 'UPS Battery':
                $Hardware = Hardware::where('sticker_number', $request->post('ID_computer'))->get();
                $id = $Hardware[0]->hardware_id;
                $old_item = $Hardware[0]->ups_battery;
                $Hardware = Hardware::find($id);
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
                $Software = Software::where('sticker_number', $request->post('ID_computer'))->get();
                $id = $Software[0]->software_id;
                $old_item = $Software[0]->teamviewer;
                $Software = Software::find($id);
                $Software->teamviewer = str_replace(" ", "", $request->post('Value_add'));
                $Software->save();
                $this->Change_Historys_Log($request->post('ID_computer'), $request->post('Type_add'), str_replace(" ", "", $request->post('Value_add')), $request->post('Item_ststus'), $old_item, $request->post('Remark'));
                return Response::json(array('status' => 'success','error_text' => 'บันทึก เสร็จสิ้น รอ 3วินาที'),200);
            break; 
            // Anydesk
            case 'Anydesk':
                $Software = Software::where('sticker_number', $request->post('ID_computer'))->get();
                $id = $Software[0]->software_id;
                $old_item = $Software[0]->anydesk;
                $Software = Software::find($id);
                $Software->anydesk = str_replace(" ", "", $request->post('Value_add'));
                $Software->save();
                $this->Change_Historys_Log($request->post('ID_computer'), $request->post('Type_add'), str_replace(" ", "", $request->post('Value_add')), $request->post('Item_ststus'), $old_item, $request->post('Remark'));
                return Response::json(array('status' => 'success','error_text' => 'บันทึก เสร็จสิ้น รอ 3วินาที'),200);
            break; 

            /**
             * System
             */

            // Windows
            case 'Windows':
                $System = System::where('sticker_number', $request->post('ID_computer'))->get();
                $id = $System[0]->system_id;
                $old_item = $System[0]->windows;
                $System = System::find($id);
                $System->windows = $request->post('Value_add');
                $System->save();
                $this->Change_Historys_Log($request->post('ID_computer'), $request->post('Type_add'), $request->post('Value_add'), $request->post('Item_ststus'), $old_item, $request->post('Remark'));
                return Response::json(array('status' => 'success','error_text' => 'บันทึก เสร็จสิ้น รอ 3วินาที'),200);
            break; 
            // Computer Name
            case 'Computer Name':
                $System = System::where('sticker_number', $request->post('ID_computer'))->get();
                $id = $System[0]->system_id;
                $old_item = $System[0]->computer_name;
                $System = System::find($id);
                $System->computer_name = $request->post('Value_add');
                $System->save();
                $this->Change_Historys_Log($request->post('ID_computer'), $request->post('Type_add'), $request->post('Value_add'), $request->post('Item_ststus'), $old_item, $request->post('Remark'));
                return Response::json(array('status' => 'success','error_text' => 'บันทึก เสร็จสิ้น รอ 3วินาที'),200);
            break; 
            // IP Address Main
            case 'IP Address Main':
                $System = System::where('sticker_number', $request->post('ID_computer'))->get();
                $id = $System[0]->system_id;
                $old_item = $System[0]->ip_main;
                $System = System::find($id);
                $System->ip_main = $request->post('Value_add');
                $System->save();
                $this->Change_Historys_Log($request->post('ID_computer'), $request->post('Type_add'), $request->post('Value_add'), $request->post('Item_ststus'), $old_item, $request->post('Remark'));
                return Response::json(array('status' => 'success','error_text' => 'บันทึก เสร็จสิ้น รอ 3วินาที'),200);
            break; 
            // IP Address Sub
            case 'IP Address Sub':
                $System = System::where('sticker_number', $request->post('ID_computer'))->get();
                $id = $System[0]->system_id;
                $old_item = $System[0]->ip_sub;
                $System = System::find($id);
                $System->ip_sub = $request->post('Value_add');
                $System->save();
                $this->Change_Historys_Log($request->post('ID_computer'), $request->post('Type_add'), $request->post('Value_add'), $request->post('Item_ststus'), $old_item, $request->post('Remark'));
                return Response::json(array('status' => 'success','error_text' => 'บันทึก เสร็จสิ้น รอ 3วินาที'),200);
            break; 
            // Internet
            case 'Internet':
                $System = System::where('sticker_number', $request->post('ID_computer'))->get();
                $id = $System[0]->system_id;
                $old_item = $System[0]->internet;
                $System = System::find($id);
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
