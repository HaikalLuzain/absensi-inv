<?php

namespace App\Http\Controllers;

use Auth;
use App\Attendance;
use App\Leave;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Attendance::latest()->get();

        return view('pages.attendance.index', [
            'data' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $attend = Attendance::where('user_id', Auth::id());
        $data = $attend->latest()->get();
        $check = $attend->whereDate('check_in', date('Y-m-d'))->first();

        $absent = Leave::where('user_id', Auth::id())->latest()->first();

        $isAbsentDate = false;

        if ($absent) {

            $isAbsentDate = Carbon::now()->gte($absent->absent_from) && Carbon::now()->lessThanOrEqualTo($absent->absent_to);
        }


        return view('pages.attendance.create', [
            'data' => $data,
            'check' => $check,
            'today' => Carbon::now(),
            'absent' => $absent,
            'isAbsen' => $isAbsentDate,
        ]);
    }

    public function checkIn()
    {
        DB::beginTransaction();

        try {

            $attend = Attendance::create([
                'user_id' => Auth::id(),
                'check_in' => Carbon::now()
            ]);

            DB::commit();

            return redirect()->back()->with('success', 'Success checking-in for today');
            

        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function checkOut()
    {
        DB::beginTransaction();

        try {

            $attend = Attendance::where('user_id', Auth::id())->whereDate('check_in', date('Y-m-d'))->first();

            $attend->check_out = Carbon::now();
            $attend->save();

            DB::commit();

            return redirect()->back()->with('success', 'Success checking-out for today');
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function show(Attendance $attendance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function edit(Attendance $attendance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Attendance $attendance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function destroy(Attendance $attendance)
    {
        //
    }
}
