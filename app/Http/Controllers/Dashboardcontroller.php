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
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB as DB;

class Dashboardcontroller extends Controller
{
    public function Ajax_Table_Main(Request $request)
    {
        $users = DB::table('runcomputers')
                ->join('hardwares', 'runcomputers.sticker_number', '=', 'hardwares.sticker_number')
                ->join('softwares', 'runcomputers.sticker_number', '=', 'softwares.sticker_number')
                ->join('systems', 'runcomputers.sticker_number', '=', 'systems.sticker_number')
                ->join('guests', 'runcomputers.sticker_number', '=', 'guests.sticker_number')
                ->get();
        return Datatables::of($users)
        ->editColumn('teamviewer', function($users) {
            $url = "https://start.teamviewer.com/device/".$users->teamviewer."/authorization/password/mode/control";
            $result = "<a href='$url' class='btn btn-sm btn-primary stretched-link' target='_blank'><i class='fas fa-external-link-alt'></i></a>"."  ".$users->teamviewer;
            return $result;
        })
        ->addColumn('action', function ($users) {
            $result  = '<button class="btn btn-sm btn-success" id="'.$users->sticker_number.'"><i class="fas fa-search"></i>View</button> ';
            return $result;
        })
        ->rawColumns(['teamviewer','action'])
        ->make(true);
    }
}
