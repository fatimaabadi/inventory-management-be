@extends('layouts/master')
@section('content')

<header class="page-header">
    <h1>Successfully placed</h1>
   
</header>
<section class="page-success">
    <div class="container">
        <h1>your order successfully been placed</h1>
        <h2>your order ID is: {{$order->id}}</h2>
        
    </div>
</section>

@endsection
