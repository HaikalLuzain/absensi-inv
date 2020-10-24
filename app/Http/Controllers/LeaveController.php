<?php

namespace App\Http\Controllers;

use Auth;
use App\Leave;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class LeaveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Leave::latest()->get();

        return view('pages.leave.index', [
            'data' => $data,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.leave.create', [
            'action' => route('leave.store'),
            'today' => Carbon::now()
        ]);
    }

    public function download($userid, $filename)
    {
        DB::beginTransaction();

        try {
            $path = public_path() . "/storage/attachments/user-" . $userid . "/" . $filename;
        
            return response()->download($path);
            
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
        $data = $request->only([
            'absent_from',
            'absent_to',
            'attachment'
        ]);

        $start = Carbon::parse($data['absent_from']);
        $end = Carbon::parse($data['absent_to']);

        if ($start->gt($end)) {
            return redirect()->back()->with('absent_from', 'Field absent from must be before absent to');
        } else {

            DB::beginTransaction();

            try {
                if ($request->hasfile('attachment')) {
                    if (!Storage::exists(public_path() . "storage/attachments/user-" . Auth::id())) {
                        $path = "storage/attachments/user-" . Auth::id();
                        Storage::makeDirectory(public_path() . $path);
                    }

                    $path = "storage/attachments/user-" . Auth::id();

                    $file = $request->file('attachment');
                    $extension = $file->getClientOriginalExtension(); // getting file extension
                    $filename = "attachment-" . Carbon::now()->toDateString() . "-" . time() . "." . $extension;
                    $file->move($path, $filename);
                    $data['attachment'] = $filename;

                    $data['user_id'] = Auth::id();

                    Leave::create($data);

                    DB::commit();

                    return redirect()->route('user.attendance')->with('success', 'Success added absent');
                } else {
                    return redirect()->back()->with('error', 'Something went wrong!');
                }

            } catch (\Exception $e) {
                DB::rollBack();
                throw $e;
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Leave  $leave
     * @return \Illuminate\Http\Response
     */
    public function show(Leave $leave)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Leave  $leave
     * @return \Illuminate\Http\Response
     */
    public function edit(Leave $leave)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Leave  $leave
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Leave $leave)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Leave  $leave
     * @return \Illuminate\Http\Response
     */
    public function destroy(Leave $leave)
    {
        //
    }
}
