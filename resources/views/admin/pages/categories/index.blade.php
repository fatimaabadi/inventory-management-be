@extends('layouts.admin')

@section('title','category')


@section('content')

  <h1 class="page-title">category</h1>
   <div class="container">

     <div class="row mb-5">

          <div class="col-md-6 offset-md3">
             <div class="card">
                  <div class="card-header">
                       <h5>create category</h5>
                  </div>
                  <div class="card-body">
                       
                     <form action="{{route('adminpanel.categories.store')}}" method="post">
                         @csrf  
                         <div class="form-group md-3">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}">
                             @error('name')
                             
                               <span class="invalid-feedback">

                                 <strong>{{$message}}</strong>
                               </span>
                             @enderror
                         </div>
                         <div class="form-group text-end">
                            <button type="submit" class="btn btn-primary">Create</button>
                         </div>
                     </form>
                  </div>

             </div>
          </div>
     </div>

     <div class="row">
        <div class="col-12">
            <div class="card">
               <div class="card-header">
                 <h5>Categories</h5>
               </div>
               <div class="card-body">
                  <table class="table table-stripped">

                      <thead>
                         <tr> 
                            <th>#</th>
                            <th>Name</th>
                            <th>Total Products</th>
                            <th>Published</th>
                            <th>Action</th>
                          </tr>
                      </thead>
                      <tbody>
                         @foreach ($categories as $category)
                         <tr> 
                            <td>{{$category->id}}</td>
                            <td>{{$category->name}}</td>
                            <td>-</td>
                            <td>{{\Carbon\Carbon::parse($category->created_at)->format('d/m/Y')}}</td>
                            <td>
                              <form action="{{route('adminpanel.categories.destroy',$category->id)}}" method="post">

                                     @csrf 
                                     @method('DELETE')
                                     <button type="submit" class="btn btn-danger">
                                         Delete
                                     </button>
                              </form>

                            </td>
                          </tr>
                         @endforeach
                  

                      </tbody>
                  </table>
               </div>
            </div>
        </div>
     </div>
   </div>


  </h1>
@endsection