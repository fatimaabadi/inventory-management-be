@extends('layouts.master')
@section('content')
   @if (session()->has('addedToCart'))
      <section class="pop-up">
         <div class="pop-up-box">
             <div class="pop-up-title">
                 {{session()->get('addedToCart')}}
             </div>
             <div class="pop-up-action">
                 <a href="{{route('home')}}" class="btn btn-outlined">Continue  shopping</a>
                 <a href="{{route('cart')}}" class="btn btn-primary">Go to cart</a>
             </div>
         </div>
      </section>
   @endif

   <div class="product-page">
       <div class="container">
           <div class="product-page-row">
               <section class="product-page-image">
                   <img src="{{ asset('storage/' . ($product->image ?? 'default.png')) }}">
                   <form action="" method="post">
                      <button class="add-to-wishlist" type="submit">Add to wishlist</button>
                   </form>
               </section>
               <section class="product-page-details">
               
                   <p class="p-title">{{ $product->title }}</p>
                   <p class="p-price">{{ $product->price }}</p>
                   <p class="p-category">{{ $product->category->name }}</p>
                   <p class="p-description">{{ $product->description }}</p>

                   <form action="{{ route('addToCart', $product->id) }}" method="post">
                       @csrf
                       <div class="p-form">
                           <div class="p-colors">
                               <label for="color">Colors</label>
                               <select name="color" id="color">
                                   <option value="">-- Select color --</option>
                                   @foreach($product->colors as $color)
                                   <option value="{{ $color->id }}">{{ $color->name }}</option>
                                   @endforeach
                               </select>
                           </div>
                           <div class="p-quantity">
                               <label for="quantity">Quantity</label>
                               <input type="number" value="1" name="quantity">
                           </div>
                           <button class="btn btn-cart" type="submit">Add to cart</button>
                       </div>
                  
                   </form>
               </section>
           </div>
       </div>
   </div>
@endsection
