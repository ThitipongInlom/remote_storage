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
        $users = DB::table('item')->get();
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
        ->addColumn('status_com', function ($users) {
            $url = url("view/$users->sticker_number");
            $result  = "";
            return $result;
        })
        ->rawColumns(['ip_main', 'teamviewer', 'anydesk', 'action'])
        ->make(true);
    }
}
