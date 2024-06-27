@extends('layout.mainLayout')
@section ('title', 'Login')
@section('content')
    <div class="registration-wrapper" style="background-image: url('{{ asset('images/bg-registration-form-1.jpg') }}');">
        <div class="registration-inner">
            <div class="registration-image-holder">
                <img src="{{ asset('images/registration-form-1.jpg') }}" alt="Registration Form Image">
            </div>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <h3>Login Form</h3>
                <div class="registration-form-wrapper">
                    <input type="text" name="email" placeholder="Email Address" class="registration-form-control">
                    <i class="zmdi zmdi-email"></i>
                </div>
                <div class="registration-form-wrapper">
                    <input type="password" name="password" placeholder="Password" class="registration-form-control">
                    <i class="zmdi zmdi-lock"></i>
                </div>
                <button type="submit" class="registration-button">Login <i class="zmdi zmdi-arrow-right"></i></button>
            </form>
        </div>
    </div>
    @endsection
