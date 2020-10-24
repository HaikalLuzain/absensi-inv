@extends('layouts.auth-temp')

@section('title' , 'Login')

@section('content')
<div class="container" style="height: 100vh !important">

    <!-- Outer Row -->
    <div class="row justify-content-center h-100 align-items-center">



        <div class="col-xl-6 col-lg-6 col-md-6">
            <div class="text-center">
                <h1 class="text-primary pb-5"><b>Absensi</b></h1>
            </div>

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Login</h1>
                        </div>
                        <form class="user" method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group">
                                <input type="text"
                                    class="form-control form-control-user @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                                    placeholder="Enter your email...">

                                @error('email')
                                <span class="ml-2 invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="password"
                                    class="form-control form-control-user @error('password') is-invalid @enderror"
                                    name="password" required placeholder="Password">

                                @error('password')
                                <span class="ml-2 invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <button class="btn btn-primary btn-user btn-block mt-4">
                                Login
                            </button>
                        </form>
                        <hr>
                        {{-- <div class="text-center">
                            <a class="small" href="forgot-password.html">Forgot Password?</a>
                        </div> --}}
                        {{-- <div class="text-center">
                            <a class="small" href="register.html">Create an Account!</a>
                        </div> --}}
                    </div>
                </div>
            </div>

            <div class="text-center pt-5">
                <span>Copyright &copy; Haikal Fikri Luzain 2020</span>
            </div>

        </div>

    </div>

</div>
@endsection