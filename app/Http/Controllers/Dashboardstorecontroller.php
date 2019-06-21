<?php

namespace App\Http\Controllers;

use Response;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB as DB;

class Dashboardstorecontroller extends Controller
{
    public function Ajax_Table_Main(Request $request)
    {
        if ($request->post('select_month') != '') {
            $sting_to_array = explode(" ", $request->post('select_month'));
            $month = $sting_to_array[0];
            $year  = $sting_to_array[1];
            switch ($month) {
                case 'มกราคม':   $month = '1'; break;
                case 'กุมภาพันธ์':  $month = '2'; break;
                case 'มีนาคม':    $month = '3'; break;
                case 'เมษายน':   $month = '4'; break;
                case 'พฤษภาคม':  $month = '5'; break;
                case 'มิถุนายน':   $month = '6'; break;
                case 'กรกฎาคม':  $month = '7'; break;
                case 'สิงหาคม':  $month = '8';  break;
                case 'กันยายน':  $month = '9';  break;
                case 'ตุลาคม':   $month = '10';  break;
                case 'พฤศจิกายน':  $month = '11'; break;
                case 'ธันวาคม':  $month = '12';   break;
            }
        }else{
            $month = date("m");
            $year  = date("Y");      
        }
        $users = DB::table('storemanus')
                ->get();
        return Datatables::of($users) 
            ->addColumn('buy_to_date', function ($users) {
                $result = DB::table('storemains')
                        ->where('item_type', '=', $users->storemanu_name)
                        ->orderBy('date_item_in', 'desc')
                        ->limit(1)
                        ->get();
                foreach ($result as $key => $row) {
                    $date_item_in = $row->date_item_in;
                    return date('d/m/Y', strtotime($row->date_item_in));
                }
            })
            ->addColumn('totalmax', function ($users) {
                $result = DB::table('storemains')
                        ->where('item_type', '=', $users->storemanu_name)
                        ->sum('item_in_stock');
                return $result;
            })
            ->addColumn('use_item', function ($users) {
                $result = DB::table('storemains')
                        ->where('item_type', '=', $users->storemanu_name)
                        ->where('location_use', '<>', '')
                        ->count();
                return $result;
            })
            ->addColumn('lend_item', function ($users) {
                $result = DB::table('storemains')
                        ->where('item_type', '=', $users->storemanu_name)
                        ->where('location_lend', '<>', '')
                        ->count();
                return $result;
            })
            ->addColumn('totalsum', function ($users) {
                $result = DB::table('storemains')
                        ->where('item_type', '=', $users->storemanu_name)
                        ->where('location_lend', '=', null)
                        ->where('location_use',  '=', null)
                        ->count();
                return $result;
            })
            ->addColumn('action', function ($users) {
                $result = '<div class="btn-group" role="group">
                            <button type="button" class="btn btn-sm btn-success" onclick="Use_select_item(this);" itemtype="'.$users->storemanu_name.'">ใช้งาน</button>
                            <button type="button" class="btn btn-sm btn-warning">แก้ไข</button>
                            <button type="button" class="btn btn-sm btn-info">ดูข้อมูล</button>
                           </div>';
                return $result;
            })
            ->make(true);
    }

    public function Get_item_notuse(Request $request)
    {
        $result = DB::table('storemains')
                ->where('item_type', '=', $request->post('item_type'))
                ->get();
        print_r($result);
    }

}
