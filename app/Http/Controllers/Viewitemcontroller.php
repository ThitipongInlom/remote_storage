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

class Viewitemcontroller extends Controller
{
    public function Load_item(Request $request,$sticker_number)
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
}
