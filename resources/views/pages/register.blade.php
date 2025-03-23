@extends('layouts.master')

@section('content')
<section class="login-page">
    <div class="login-form-box">
        <div class="login-title">
            Register
        </div>
        <div class="login-form">
            <form action="{{ route('register') }}" method="post">
                @csrf
                <div class="field">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" class="@error('name') has-error  @enderror" placeholder="tima" />
                    @error('name')
                        <span class="field-error">{{ $message }}</span>
                    @enderror
                </div>
                <div class="field">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" class="@error('email') has-error  @enderror" placeholder="tima98@gmail.com" />
                    @error('email')
                        <span class="field-error">{{ $message }}</span>
                    @enderror
                </div>
                <div class="field">
                    <label for="password">Password</label>
                    <input type="password" id="password"  class="@error('password') has-error  @enderror" name="password" />
                    @error('password')
                        <span class="field-error">{{ $message }}</span>
                    @enderror
                </div>
                <div class="field">
                    <label for="password_confirmation">Confirm Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" />
                </div>
                <div class="field">
                    <button type="submit" class="btn btn-primary btn-block">Register</button>
                </div>

                <a href="{{route('login')}}">already a User? Login Now</a>
            </form>
        </div>
    </div>
</section>
@endsection
