@extends('layouts.master')

@section('content')
<section class="login-page">
    <div class="login-form-box">
        <div class="login-title">
             Login
        </div>
        <div class="login-form">
            <form action="{{ route('login') }}" method="post">
                @csrf
                <div class="field">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" class="@error('email') has-error @enderror" placeholder="tima98@gmail.com" />
                    @error('email')
                        <span class="field-error">{{ $message }}</span>
                    @enderror
                </div>
                <div class="field">
                    <label for="password">Password</label>
                    <input type="password" id="password" class="@error('password') has-error @enderror" name="password" />
                    @error('password')
                        <span class="field-error">{{ $message }}</span>
                    @enderror
                </div>
                @if (session('error'))
                    <div class="field-error">{{ session('error') }}</div>
                @endif
                <div class="field">
                    <button type="submit" class="btn btn-primary btn-block">Login</button>
                </div>
                <a href="{{route('register')}}">New User? Register Now</a>

            </form>
        </div>
    </div>
</section>
@endsection
