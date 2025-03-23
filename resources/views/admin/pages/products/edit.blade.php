@extends('layouts.admin')

@section('title','Edit Products')


@section('content')
  <h1 class="page-title">Edit Products</h1>
   <div class="container">

     <div class="row nb-5">

          <div class="col-12">
             <div class="card">
                  <div class="card-header">
                       <h5>create product</h5>
                  </div>

                  <div class="card-body">
                       
                     <form action="{{route('adminpanel.products.update',$product->id)}}" method="post" enctype="multipart/form-data">
                         @csrf 
                         @method('PUT')

                         <div class="row mb-3">
                           <div class="col-md-6">
                           <div class="form-group md-3">
                            <label for="title">Title</label>
                            <input type="text" name="title" id="title" class="form-control @error('name') is-invalid @enderror" value="{{$product->title}}">
                             @error('title')
                             
                               <span class="invalid-feedback">

                                 <strong>{{$message}}</strong>
                               </span>
                             @enderror
                         </div>
                           </div>
                           <div class="col-md-6">
                           <div class="form-group md-3">
                            <label for="price">Price</label>
                            <input type="number" name="price" id="price" class="form-control @error('price') is-invalid @enderror" value="{{$product->price / 100}}">
                             @error('price')
                             
                               <span class="invalid-feedback">

                                 <strong>{{$message}}</strong>
                               </span>
                             @enderror
                         </div>
</div>
                           </div>
                     
                      
                         <div class="row mb-3">
                           <div class="col-md-6">
                           
                                 <div class="form-group">
                                    <label for="category_id">Category</label>
                                    <select name="category_id" id="category_id" class="form-control  @error('category_id') is-invalid @enderror">
                                    <option value="">--Select Category</option>
                                    @foreach($categories as $category)
                                    <option value="{{$category->id}}" {{  $product->category_id == $category->id ? 'selected' : "" }}>{{$category->name}}</option>
                                    @endforeach
                                    </select>
                                   @error('category_id')
                                       <span class="invalid-feedback">
                                        <strong>{{$message}}</strong>
</span>
                                   @enderror
                                </div>
                         </div>
                         <div class="col-md-6">
                           
                           <div class="form-group">
                             <label for="image">Image</label>
                             <input type="file" name="image" id="image" class="form-control  @error('image') is-invalid @enderror" >

</div>                           @error('image')
                                       <span class="invalid-feedback">
                                        <strong>{{$message}}</strong>
</span>
                                   @enderror
                                   <img src="{{asset('storage/'.$product->image)}}" alt="" width="100px" height="100px">
</div>
                           </div>
                        <div class="row mb-3">
                          <div class="col-md-6">
                              <label for="colors">colors</label>
                              @foreach ($colors as $color)
                                <div class="form-check form-check-inline">
                                  <input type="checkbox" name="colors[]" class="form-check-input" id="{{$color->name}}" value="{{$color->id}}" {{ in_array($color->id, $product->colors->pluck('id')->toArray()) ? 'checked' : '' }}>
                                  <label for="{{$color->name}}" class="form-check-label">{{$color->name}}</label>
                                </div>
                              @endforeach
                          </div>
                        </div>
                        <div class="row mb-3">
                           <div class="col-md-12">
                              <div class="form-group">
                                 <label for="description">description</label>
                                 <textarea name="description" id="description" cols="30" rows="10">{{$product->description}}</textarea>
                           </div>
                        </div>
                         <div class="form-group text-end">
                            <button type="submit" class="btn btn-primary">Update</button>
                         </div>
                     </form>
                  </div>

             </div>
          </div>
     </div>
@endsection