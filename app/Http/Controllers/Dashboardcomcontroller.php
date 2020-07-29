<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Model\Item as Item;
use App\Model\User as User;
use App\Model\Department as Department;
use App\Model\Hotel as Hotel;
use App\Model\Window as Window;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB as DB;

class Dashboardcomcontroller extends Controller
{
    public function View_Dashboardcom(Request $request)
    {
        return view('page/dashboardcom', [
            'Department' => Department::get(),
            'Hotel' => Hotel::get(),
            'Window' => Window::get()
        ]);
    }
}
