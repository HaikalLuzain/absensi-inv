@extends('layouts.main')

@section('title', 'Create User')

@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> --}}
    </div>

    <!-- Content -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Add User</h6>
        </div>
        <div class="card-body">
            <form action="{{ $action }}" method="post">
                @csrf

                <div class="row">
                    <div class="col-lg-6 mx-auto">
                        <div class="form-group mb-4">
                            <label for="">Name</label>
                            <input type="text" class="form-control" name="name" required autocomplete="off" value="{{ old('name') }}">
                        </div>

                        <div class="form-group mb-4">
                            <label for="">Name</label>
                            <select class="form-control" name="role" required>
                                <option value="user">User</option>
                                <option value="admin">Admin</option>
                            </select>
                        </div>

                        <div class="form-group mb-4">
                            <label for="">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" name="email"
                                required autocomplete="off">

                            @error('email')
                            <span class="ml-2 invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group mb-4">
                            <label for="">Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" required autocomplete="off">

                            @error('password')
                            <span class="ml-2 invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group mb-4">
                            <label for="">Re-type Password</label>
                            <input type="password" class="form-control" name="password_confirmation" required
                                autocomplete="off">
                        </div>

                        <div class="form-group mb-4">
                            <label for="">Phone</label>
                            <input type="number" class="form-control" name="phone" required autocomplete="off" value="{{ old('phone') }}">
                        </div>

                        <div class="form-group mb-4">
                            <label for="">Address</label>
                            <textarea name="address" class="form-control" required>{{ old('address') }}</textarea>
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