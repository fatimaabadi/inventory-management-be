@extends('layouts/master')
@section('title', 'home page')
@section('content')
   <main class="homepage">
       @include('pages.components.home.header')
       <section class="products-section">
           <div class="container">
               <h1 class="section-title">Featured products</h1>
               <div class="products-row">
                   @foreach($products as $product)
                       <a  href="{{route('product',$product->id)}}" class="product-box">
                           <div class="image">
                               <img src="{{ asset('storage/' . ($product->image ?? 'default.png')) }}" alt="{{ $product->title ?? 'Default Title' }}">
                               <form action="{{route('addToWishlist',$product->id)}}" method="post">
                                @csrf
                      <button cadd-to-wishlistlass="" type="submit">Add to wishlist</button>
                   </form>
                           </div>
                           <div class="product-title">
                               {{ $product->title ?? 'No Title' }}
                           </div>
                           <div class="color-plateletes">
                            @foreach($product->colors as $color)
                            @endforeach
                          <div class="color-platelete" style="background: {{$color->code}}"></div>
                          </div>
                           <div class="product-category">
                               {{ $product->category->name ?? 'No Category' }}
                           </div>
                           <div class="product-price">
                               {{ $product->price ?? 'N/A' }}
                           </div>
                       </a>
                   @endforeach
               </div>
           </div>
       </section>
   </main> 
@endsection
