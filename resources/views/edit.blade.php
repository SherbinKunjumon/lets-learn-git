

@extends('templayout')
@section('title','Edit Product')
@section('content')
<h3>PRODUCTS</h3>
<div class="row">

                                                <div class="col-md-6">
<form method="post" action="{{route('products.update',$product->id)}}" enctype="multipart/form-data">
    @csrf
@method('PATCH') 

    <div class="form-group">
Product name<input name="itemname"  type="text" id="itemname" class="form-control"  value="{{$product->itemname}}">
</div>
<div class="form-group">
Catogery<select name="category" style="margin-left:20px;" >
</div>  
<div class="form-group">
<option>----select any--</option>
@foreach ($category as $cat)
<option value="{{$cat->id}}"{{ $cat->id == old('categories',$product->category) ? 'selected' : ''}}
 >{{$cat->categoryname}}
@endforeach
</option>   
</select>
</div>
</br>
<!-- <div class="form-group">
Subcategory<input  name="subcategory" id="subcategory" class="form-control" type="text"  class="form-control" style="margin-left:20px;">
</div>
 --> 
<div class="form-group">
Description<textarea name="description" class="form-control" >{{$product->description}}</textarea>
</div>
<div class="form-group">
Colour<select name="colour" style="margin-left:20px;" >
</div>  
<div class="form-group">

<option>----select any--</option>
@foreach ($colour as $col)

        <option value="{{$col->id}}" {{ $col->id == old('colours',$product->colour) ? 'selected' : '' }}>
          {{$col->colourname}}

</option> 
@endforeach
       
</select>
</div>
</br>

<div class="form-group">

Amount<input name="amount" id="amount" style="margin-left:20px;" value="{{$product->amount}}">
</div>
<div class="form-group ">

Features  

 </div>
 @foreach ($productfeature as $fet)
 <input type="checkbox" name="features[{{$fet->featureid}}]" id="features[{{$fet->featureid}}]" 
 class="form-control"style="margin-left:20px;" {{( $fet->featurevalue==1) ? 'checked' : '' }}>{{$fet->featurename}}
 @endforeach
 </div><div class="form-group ">
 <input type="file" name="productimage" id="productimage">

<img src="{{ asset('storage/'.$product->filename) }}" width=100px height=100px>
</div>
<button type="submit"  name="submit" class="btn btn-primary mb-2">Submit</button>
</form>
</div>
@endsection
