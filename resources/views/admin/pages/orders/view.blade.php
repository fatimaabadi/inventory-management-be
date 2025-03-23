@extends('layouts.admin')

@section('title','Order Details')

@section('content')
  <h1 class="page-title">Order #{{ $order->id }} Details</h1>
   <div class="container">
       <div class="row">
           <div class="col-12">
               <div class="card">
                   <div class="card-header">
                       <h5>Order Information</h5>
                   </div>
                   <div class="card-body">
                       <p><strong>Order ID:</strong> {{ $order->id }}</p>
                       <p><strong>Customer Name:</strong> {{ $order->user->name }}</p>
                       <p><strong>Total Amount:</strong> {{ $order->total }}</p>
                       <p><strong>Date:</strong> {{ \Carbon\Carbon::parse($order->created_at)->format('d/m/Y') }}</p>
                       <p><strong>Status:</strong> {{ $order->status }}</p>
                       <h5>Order Items</h5>
                       <table class="table table-striped">
                           <thead>
                               <tr>
                                   <th>Item Name</th>
                                   <th>Quantity</th>
                                   <th>Price</th>
                               </tr>
                           </thead>
                           <tbody>
                               @foreach ($order->items as $item)
                                   <tr>
                                       <td>{{ $item->name }}</td>
                                       <td>{{ $item->pivot->quantity }}</td>
                                       <td>{{ $item->price }}</td>
                                   </tr>
                               @endforeach
                           </tbody>
                     
