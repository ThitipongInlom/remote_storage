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
                    'Item' => $data,]);
    }

    public function Load_item_view_history(Request $request, $sticker_number)
    {
        $users = ChangeHistory::where('sticker_number', $sticker_number)->get();

        return Datatables::of($users)
        ->editColumn('created_at', function($users) {
            $result = date("d/m/Y",strtotime($users->created_at));
            return $result;
        })
        ->make(true);
    }

    public function Update_item_view_save(Request $request)
    {
        switch ($request->post('Type_add')) {

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
                $this->Change_Historys_Log($request->post('ID_computer'), $request->post('Type_add'), $request->post('Value_add'), $request->post('Item_ststus'), $old_item);
                return Response::json(array('status' => 'success','error_text' => 'บันทึก เสร็จสิ้น รอ 3วินาที'),200);
            break;
            // RAM
            case 'RAM':
                $Hardware = Hardware::where('sticker_number', $request->post('ID_computer'))->get();
                $id = $Hardware[0]->hardware_id;
                $Hardware = Hardware::find($id);
                $Hardware->ram = $request->post('Value_add');
                $Hardware->save();
                return Response::json(array('status' => 'success','error_text' => 'บันทึก เสร็จสิ้น รอ 3วินาที'),200);
            break; 
            // Case
            case 'Case':
                $Hardware = Hardware::where('sticker_number', $request->post('ID_computer'))->get();
                $id = $Hardware[0]->hardware_id;
                $Hardware = Hardware::find($id);
                $Hardware->case = $request->post('Value_add');
                $Hardware->save();
                return Response::json(array('status' => 'success','error_text' => 'บันทึก เสร็จสิ้น รอ 3วินาที'),200);
            break;      
            // Monitor
            case 'Monitor':
                $Hardware = Hardware::where('sticker_number', $request->post('ID_computer'))->get();
                $id = $Hardware[0]->hardware_id;
                $Hardware = Hardware::find($id);
                $Hardware->monitor = $request->post('Value_add');
                $Hardware->save();
                return Response::json(array('status' => 'success','error_text' => 'บันทึก เสร็จสิ้น รอ 3วินาที'),200);
            break;    
            // Mouse
            case 'Mouse':
                $Hardware = Hardware::where('sticker_number', $request->post('ID_computer'))->get();
                $id = $Hardware[0]->hardware_id;
                $Hardware = Hardware::find($id);
                $Hardware->mouse = $request->post('Value_add');
                $Hardware->save();
                return Response::json(array('status' => 'success','error_text' => 'บันทึก เสร็จสิ้น รอ 3วินาที'),200);
            break;  
            // Keyboard
            case 'Keyboard':
                $Hardware = Hardware::where('sticker_number', $request->post('ID_computer'))->get();
                $id = $Hardware[0]->hardware_id;
                $Hardware = Hardware::find($id);
                $Hardware->keyboard = $request->post('Value_add');
                $Hardware->save();
                return Response::json(array('status' => 'success','error_text' => 'บันทึก เสร็จสิ้น รอ 3วินาที'),200);
            break;    
            // Mainboard
            case 'Mainboard':
                $Hardware = Hardware::where('sticker_number', $request->post('ID_computer'))->get();
                $id = $Hardware[0]->hardware_id;
                $Hardware = Hardware::find($id);
                $Hardware->mainboard = $request->post('Value_add');
                $Hardware->save();
                return Response::json(array('status' => 'success','error_text' => 'บันทึก เสร็จสิ้น รอ 3วินาที'),200);
            break; 
            // Power Supply
            case 'Power Supply':
                $Hardware = Hardware::where('sticker_number', $request->post('ID_computer'))->get();
                $id = $Hardware[0]->hardware_id;
                $Hardware = Hardware::find($id);
                $Hardware->powersupply = $request->post('Value_add');
                $Hardware->save();
                return Response::json(array('status' => 'success','error_text' => 'บันทึก เสร็จสิ้น รอ 3วินาที'),200);
            break;   
            // HDD
            case 'HDD':
                $Hardware = Hardware::where('sticker_number', $request->post('ID_computer'))->get();
                $id = $Hardware[0]->hardware_id;
                $Hardware = Hardware::find($id);
                $Hardware->hdd = $request->post('Value_add');
                $Hardware->save();
                return Response::json(array('status' => 'success','error_text' => 'บันทึก เสร็จสิ้น รอ 3วินาที'),200);
            break;  
            // HDD
            case 'SSD':
                $Hardware = Hardware::where('sticker_number', $request->post('ID_computer'))->get();
                $id = $Hardware[0]->hardware_id;
                $Hardware = Hardware::find($id);
                $Hardware->ssd = $request->post('Value_add');
                $Hardware->save();
                return Response::json(array('status' => 'success','error_text' => 'บันทึก เสร็จสิ้น รอ 3วินาที'),200);
            break;      
            
            /**
             * Software
             */

            // Teamviewer
            case 'Teamviewer':
                $Software = Software::where('sticker_number', $request->post('ID_computer'))->get();
                $id = $Software[0]->software_id;
                $Software = Software::find($id);
                $Software->teamviewer = $request->post('Value_add');
                $Software->save();
                return Response::json(array('status' => 'success','error_text' => 'บันทึก เสร็จสิ้น รอ 3วินาที'),200);
            break; 
            // Anydesk
            case 'Anydesk':
                $Software = Software::where('sticker_number', $request->post('ID_computer'))->get();
                $id = $Software[0]->software_id;
                $Software = Software::find($id);
                $Software->anydesk = $request->post('Value_add');
                $Software->save();
                return Response::json(array('status' => 'success','error_text' => 'บันทึก เสร็จสิ้น รอ 3วินาที'),200);
            break; 

            /**
             * System
             */
            // Windows
            case 'Windows':
                $System = System::where('sticker_number', $request->post('ID_computer'))->get();
                $id = $System[0]->system_id;
                $System = System::find($id);
                $System->windows = $request->post('Value_add');
                $System->save();
                return Response::json(array('status' => 'success','error_text' => 'บันทึก เสร็จสิ้น รอ 3วินาที'),200);
            break; 
            // Computer Name
            case 'Computer Name':
                $System = System::where('sticker_number', $request->post('ID_computer'))->get();
                $id = $System[0]->system_id;
                $System = System::find($id);
                $System->computer_name = $request->post('Value_add');
                $System->save();
                return Response::json(array('status' => 'success','error_text' => 'บันทึก เสร็จสิ้น รอ 3วินาที'),200);
            break; 
            // IP Address Main
            case 'IP Address Main':
                $System = System::where('sticker_number', $request->post('ID_computer'))->get();
                $id = $System[0]->system_id;
                $System = System::find($id);
                $System->ip_main = $request->post('Value_add');
                $System->save();
                return Response::json(array('status' => 'success','error_text' => 'บันทึก เสร็จสิ้น รอ 3วินาที'),200);
            break; 
            // IP Address Sub
            case 'IP Address Sub':
                $System = System::where('sticker_number', $request->post('ID_computer'))->get();
                $id = $System[0]->system_id;
                $System = System::find($id);
                $System->ip_sub = $request->post('Value_add');
                $System->save();
                return Response::json(array('status' => 'success','error_text' => 'บันทึก เสร็จสิ้น รอ 3วินาที'),200);
            break; 

        }
    }

    public function Change_Historys_Log($ID_Computer, $Item_type, $Value_add, $Item_ststus, $old_item)
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
            // Insert User Change 
            $ChangeHistory->users_change = Auth::user()->username;
            // Insert Save
            $ChangeHistory->save();
            return;
    }

}
