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
use App\Model\Department as Department;
use App\Model\Hotel as Hotel;
use App\Model\Window as Window;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB as DB;

class Addselectitemcontroller extends Controller
{
    public function Add_select_item()
    {
        return view('page/addselectitem', [
                    'Department' => Department::get(),
                    'Hotel' => Hotel::get(),
                    'Window' => Window::get()]);
    }
}
