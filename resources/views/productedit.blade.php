@extends('templayout')
@section('title','EDIT PRODUCT')
@section('content')
<h3> PRODUCTS </h3>
<div class="row">
                                                <div class="col-md-6">
<form method="post" action="{{route('product.update',$product->id)}}">@csrf 
@method('PATCH')
 <div class="form-group">
     <label>Product name:</label>
     <input type="text" class="form-control" placeholder="Text" name="productname" value={{$product->productname}}>
</div>

 <div class="form-group">
    <label>Rate: </label>
    <input type="text" class="form-control" placeholder="######" name="productrate" value={{$product->rate}}>
  </div>
                                                                
 
  <div class="form-group">
    <label for="Category">Category:</label>
    <select class="form-control"  name="category">
        <option >---select any---</option>
        @foreach ($category as $cat)
        <option value="{{$cat->id}}" {{ $cat->id == old('category',$pro->categoryid) ? 'selected' : ''}}
 >{{$cat->categoryname}}</option>
        @endforeach
     @foreach ($colors as $col)
        <option value="{{$col->id}}" {{ $col->id == old('colors',$pro->color) ? 'selected' : '' }}>
          {{$col->colorname}}
       
    </select>
</div>
    </br>

    <div class="form-group">
    <label for="colors">colors: </label>
    <select class="form-control"  name="colors">
        <option >---select any---</option>
        @foreach ($colors as $col)
        <option value="{{$col->id}}" {{ $col->id == old('colors',$pro->color) ? 'selected' : '' }}>
          {{$col->colorname}}
        </option>
        @endforeach
</select></div></br>



<div class="form-group">
   <label for="description">Description:</label>
    <textarea class="form-control" textarea name="productdescription" rows="3"  >

    {{$pro->description}}


    </textarea>
 </div>

<button type="submit"  name="submit" class="btn btn-primary mb-2">Submit</button>


</form>
</div></div>
@endsection