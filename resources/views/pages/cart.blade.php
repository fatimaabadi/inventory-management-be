@extends('layouts/master')
@section('content')

<header class="page-header">
    <h1>Cart</h1>
    <h3 class="cart-amount">${{App\Models\Cart::totalAmmount()}}</h3>
</header>
@if (session()->has('success'))
      <section class="pop-up">
         <div class="pop-up-box">
             <div class="pop-up-title">
                 {{session()->get('addedToCart')}}
             </div>
             <div class="pop-up-action">
                 <a href="{{route('cart')}}" class="btn btn-outlined">Continue  shopping</a>
                 <a href="{{route('cart')}}" class="btn btn-primary">Go to checkout</a>
             </div>
         </div>
      </section>
   @endif
<main class="cart-page">
    <div class="container">
        <div class="cart-table">
            <table class="table">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Color</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>-</th>
                    </tr>
                </thead>
                <tbody>
                    @if(session()->has('cart') && count(session()->get('cart')) > 0)
                        @foreach (session()->get('cart') as $key => $item)
                            <tr>
                                <td>
                                    <a href="{{ route('product', $item['product']['id']) }}" class="cart-item-title">
                                        <img src="{{ asset('storage/' . $item['product']['image']) }}" alt="{{ $item['product']['title'] }}">
                                        <p>{{ $item['product']['title'] }}</p>
                                    </a>
                                </td>
                                <td>{{ $item['color']['name'] }}</td>
                                <td>{{ number_format($item['product']['price'] / 100, 2) }}</td>
                                <td>{{ $item['quantity'] }}</td>
                                <td>{{ number_format(($item['product']['price'] / 100) * $item['quantity'], 2) }}</td>
                                <td>
                                    <form method="post" action="{{route('removeFromCart',$key)}}">
                                        @csrf
                                        <button type="submit" class="btn btn-primary">X</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="6" class="empty-cart">Your cart is empty</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
        <div class="cart-actions">
            <a href="" class="btn btn-primary">CO TO CHECKOUT</a>
        </div>
    </div>
</main>
@endsection
