@extends('layouts.main')

@section('title', 'Create Absent')

@section('content')

<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Absence</h1>
    {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> --}}
  </div>

  <!-- Content -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Add Absent</h6>
    </div>
    <div class="card-body">
      <form action="{{ $action }}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="row">
          <div class="col-lg-6 mx-auto">
            <div class="form-group row mb-4">
              <div class="col-sm-6">
                <label for="">Absent From</label>
                <input type="text" class="form-control datetimepicker {{ session('absent_from') ? 'is-invalid':'' }}"
                  name="absent_from" required autocomplete="off" value="{{ $today }}">

                @if (session('absent_from'))
                <span class="ml-2 invalid-feedback" role="alert">
                  <strong>{{ session('absent_from') }}</strong>
                </span>
                @endif
              </div>

              <div class="col-sm-6">
                <label for="">Absent To</label>
                <input type="text" class="form-control datetimepicker" name="absent_to" required autocomplete="off"
                  value="{{ old('absent_to') }}">
              </div>
            </div>

            <div class="form-group mb-4">
              <label for="">Attachment</label>
              <input type="file" class="dropify" data-max-file-size="1M" data-allowed-file-extensions="pdf png jpg"
                class="form-control" name="attachment" required autocomplete="off">
            </div>

            <div class="form-group">
              <button class="btn btn-primary">Save</button>
            </div>
          </div>

        </div>
      </form>
    </div>
  </div>

</div>

@endsection