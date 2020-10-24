@extends('layouts.main')

@section('title', 'Attendance')

@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-2">
        <h1 class="h3 mb-0 text-gray-800">Attendances</h1>
    </div>
    <p class="mb-4">
        This page is contain all of user attendances
    </p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Attendances Table</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Check In</th>
                            <th>Check Out</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                          <th>Name</th>
                          <th>Phone</th>
                          <th>Check In</th>
                          <th>Check Out</th>
                          <th>Date</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($data as $a)
                            <tr>
                                <td>{{ $a->user->name }}</td>
                                <td>{{ $a->user->phone }}</td>
                                <td>{{ $a->check_in->toTimeString() }}</td>
                                <td>{{ $a->check_out ? $a->check_out->toTimeString() : '' }}</td>
                                <td>{{ $a->created_at->isoFormat('dddd, D MMMM YYYY') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection