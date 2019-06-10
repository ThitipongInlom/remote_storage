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
        $users = DB::table('storemanus')
                //->join('storemains', 'storemanus.storemanu_name', '=', 'storemains.item_type')
                //->groupBy('storemanu_name')
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
            ->make(true);
    }
}
