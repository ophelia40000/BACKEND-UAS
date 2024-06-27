@extends('layout.mainLayout')
@section ('title', 'Registration')
@section('content')
<div class="registration-wrapper" style="background-image: url('{{ asset('images/bg-registration-form-1.jpg') }}');">
    <div class="registration-inner">
        <div class="registration-image-holder">
            <img src="{{ asset('images/registration-form-1.jpg') }}" alt="Registration Form Image">
        </div>
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Username -->
            <div class="registration-form-wrapper">
                <input type="text" name="name" placeholder="Username" class="registration-form-control" value="{{ old('name') }}">
                <i class="zmdi zmdi-account"></i>
            </div>

            <!-- Email Address -->
            <div class="registration-form-wrapper">
                <input type="email" name="email" placeholder="Email Address" class="registration-form-control" value="{{ old('email') }}">
                <i class="zmdi zmdi-email"></i>
            </div>

            <!-- Password -->
            <div class="registration-form-wrapper">
                <input type="password" name="password" placeholder="Password" class="registration-form-control">
                <i class="zmdi zmdi-lock"></i>
            </div>

            <!-- Confirm Password -->
            <div class="registration-form-wrapper">
                <input type="password" name="password_confirmation" placeholder="Confirm Password" class="registration-form-control">
                <i class="zmdi zmdi-lock"></i>
            </div>

            <button type="submit" class="registration-button">Register
                <i class="zmdi zmdi-arrow-right"></i>
            </button>
        </form>
    </div>
</div>
@endsection
