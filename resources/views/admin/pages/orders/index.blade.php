@extends('layouts.admin')

@section('title','Orders')


@section('content')
  <h1 class="page-title">Orders</h1>
   <div class="container">
   <div class="row">
        <div class="col-12">
            <div class="card">
               <div class="card-header">
                 <h5>Products</h5>
               </div>
               <div class="card-body">
                  <table class="table table-stripped">

                      <thead>
                         <tr> 
                            <th>Order Id</th>
                            <th>By</th>
                            <th>Items</th>
                            <th>Total</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>-</th>
                          </tr>
                      </thead>
                      <tbody>
                         @foreach ($orders as $order)
                         <tr> 
                            <td>{{$order->id}}</td>
                            <td>{{$order->user->name}}</td>
                            <td>{{$order->items->count}}</td>
                            <td>{{ $order->total}}</td>

         
                            <td>{{\Carbon\Carbon::parse($product->created_at)->format('d/m/Y')}}</td>
                            <td>
                              <div class="d-flex">
                              <a href="{{route('adminpanel.orders.view',$product->id)}}" class="btn btn-secondary">View</a>
                         
                              </div>
              
                            </td>
                          </tr>
                         @endforeach
                  

                      </tbody>
                  </table>
               </div>
            </div>
        </div>
   </div>
@endsection