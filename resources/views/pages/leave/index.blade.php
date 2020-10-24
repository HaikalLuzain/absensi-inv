@extends('layouts.main')

@section('title', 'Absence')

@section('content')

<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-2">
    <h1 class="h3 mb-0 text-gray-800">Absences</h1>
  </div>
  <p class="mb-4">
    This page is contain all of user Absences
  </p>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Absences Table</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Name</th>
              <th>Absent From</th>
              <th>Absent To</th>
              <th>Cut Off</th>
              <th>Attachment</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>Name</th>
              <th>Absent From</th>
              <th>Absent To</th>
              <th>Cut Off</th>
              <th>Attachment</th>
            </tr>
          </tfoot>
          <tbody>
            @foreach ($data as $a)
            <tr>
              <td>{{ $a->user->name }}</td>
              <td>{{ $a->absent_from->isoFormat('dddd, D MMMM YYYY') }}</td>
              <td>{{ $a->absent_to->isoFormat('dddd, D MMMM YYYY') }}</td>
              <td>{{ $a->cutoff }}</td>
              <td>
                @if ($a->cutoff === 'no')
                <a href="{{ route('attachment.download', [$a->user->id, $a->attachment]) }}" class="btn btn-info"><i
                    class="fas fa-download"></i> Download</a>
                @else
                <span>Nothing</span>
                @endif
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>

</div>
@endsection