@extends('layouts/master')
@section('content')

<header class="page-header">
    <h1>Checkout</h1>
    <h3 class="cart-amount">${{App\Models\Cart::totalAmmount()}}</h3>
</header>

<main class="checkout-page">
    <div class="container">
        <div class="checkout-form">
            <form action="" method="post" id="payment-form">
                   @csrf 
                   <div class="field">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" class="@error('name') has-error  @enderror" placeholder="tima" value="{{old('name') ? old('name') : auth()->user()->name}}" />
                    @error('name')
                        <span class="field-error">{{ $message }}</span>
                    @enderror
                </div>
                <div class="field">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" class="@error('email') has-error  @enderror" placeholder="tima98@gmail.com"  value="{{old('email') ? old('email') : auth()->user()->email}}" />
                    @error('email')
                        <span class="field-error">{{ $message }}</span>
                    @enderror
                </div>
                <div class="field">
                    <label for="phone">Phone number</label>
                    <input type="phone" id="phone" name="phone" class="@error('phone') has-error  @enderror" />
                    @error('phone')
                        <span class="field-error">{{ $message }}</span>
                    @enderror
                </div>
                <div class="field">
                    <label for="country">Country</label>
                    <select name="country" id="country">

<option value="">--Select a country</option>

<option value="Lebanon">--Lebanon</option>

<option value="USA">USA</option>

<option value="UK">UK</option>
</select>
                    @error('country')
                        <span class="field-error">{{ $message }}</span>
                      
                    @enderror
                </div>
            </form>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">proceed</button>
</main>
@endsection
