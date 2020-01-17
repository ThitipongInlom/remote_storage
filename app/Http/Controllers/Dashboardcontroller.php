<?php

namespace App\Http\Controllers;

use Response;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB as DB;

class Dashboardcontroller extends Controller
{
    public function Ajax_Table_Main(Request $request)
    {

        $type  = $request->post('type_select_table');
        $hotel = $request->post('hotel_select_table');
        switch ($type) {
            case 'return_yes':
                $users = DB::table('item')->where('ststus_com', 'Y')->get();
                break;
           case 'return_no':
                $users = DB::table('item')->where('ststus_com', 'N')->get();
                break;
           case 'return_wait':
                $users = DB::table('item')->where('ststus_com', 'W')->get();
                break;            
            default:
                if ($hotel == 'thezign') {
                    $users = DB::table('item')->where('hotel', 'Thezign')->get();
                }else if ($hotel == 'tsix5') {
                    $users = DB::table('item')->where('hotel', 'Tsix5')->get();
                }else if ($hotel == 'way') {
                    $users = DB::table('item')->where('hotel', 'way')->get();
                }else if ($hotel == 'z2') {
                    $users = DB::table('item')->where('hotel', 'Z-Through')->get();
                }else if ($hotel == 'garden') {
                    $users = DB::table('item')->where('hotel', 'Garden Seaview')->get();
                }else {
                    $users = DB::table('item')->get();
                }
                break;
        }

        // Return
        return Datatables::of($users)
        ->editColumn('ip_main', function($users) {
            $url = "https://start.teamviewer.com/device/".$users->ip_main."/authorization/password/mode/control";
            $img_url = url('img/cmd.png');
            $result = "<a href='$url' class='btn btn-sm btn-primary' target='_blank' data-toggle='tooltip' data-placement='bottom' title='เปิด Teamviewer'><img src='$img_url' style='width: 18px;'' class='card-img-top'></a>"."  ".$users->ip_main;
            return $result;
        })
        ->editColumn('teamviewer', function($users) {
            $url = "https://start.teamviewer.com/device/".$users->teamviewer."/authorization/password/mode/control";
            $img_url = url('img/teamviewer.png');
            $result = "<a href='$url' class='btn btn-sm btn-primary' target='_blank' data-toggle='tooltip' data-placement='bottom' title='เปิด Teamviewer'><img src='$img_url' style='width: 18px;'' class='card-img-top'></a>"."  ".$users->teamviewer;
            return $result;
        })
        ->editColumn('anydesk', function($users) {
            $url = "anydesk:$users->anydesk";
            $img_url = url('img/anydesk.png');
            $result = "<a href='$url' class='btn btn-sm btn-primary' target='_blank' data-toggle='tooltip' data-placement='bottom' title='เปิด Anydesk'><img src='$img_url' style='width: 18px;'' class='card-img-top'></a>"."  ".$users->anydesk;
            return $result;
        })
        ->addColumn('action', function ($users) {
            $url = url("view/$users->sticker_number");
            $result  = "<a class='btn btn-sm btn-primary' href='$url' role='button' data-toggle='tooltip' data-placement='bottom' title='ดูข้อมูลคอมพิวเตอร์ $users->sticker_number'><i class='fas fa-search'></i>View</a>";
            return $result;
        })
        ->addColumn('status', function ($users) {
            if ($users->ststus_com == 'Y') {
                $result = "<i class='fas fa-check' data-toggle='tooltip' data-placement='bottom' title='คอมพิวเตอร์ ใช้งาน'></i>";
            }else if ($users->ststus_com == 'N') {
                $result = "<i class='fas fa-times' data-toggle='tooltip' data-placement='bottom' title='คอมพิวเตอร์ ไม่ได้ใช้งาน'></i>";
            }else if ($users->ststus_com == 'W') {
                $result = "<i class='fas fa-tools' data-toggle='tooltip' data-placement='bottom' title='คอมพิวเตอร์ ส่งซ่อม'></i>";
            }else {
                $result = '';
            }
            return $result;
        })
        ->setRowClass(function ($users) {
            if ($users->ststus_com == 'Y') {
                $result = "bg-success";
            }else if ($users->ststus_com == 'N') {
                $result = "bg-danger";
            }else if ($users->ststus_com == 'W') {
                $result = "bg-warning";
            }else {
                $result = '';
            }
            return $result;
        })
        ->rawColumns(['ip_main', 'teamviewer', 'anydesk', 'action', 'status'])
        ->make(true);

    }
}
