<?php

namespace App\Http\Controllers;

use App\Attendance;
use App\Leave;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $attend = Attendance::whereDate('check_in', date('Y-m-d'))->count();
        $absent = Leave::where('absent_from', '<=', Carbon::now())->where('absent_to', '>=', Carbon::now())->count();


        return view('pages.dashboard.index', [
            'attendance' => $attend,
            'absence' => $absent
        ]);
    }
}
