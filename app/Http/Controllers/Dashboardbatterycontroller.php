<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Dashboardbatterycontroller extends Controller
{
    public function View_Dashboardbattery(Request $request)
    {
        return view('page/dashboardbattery');
    }
}
