@extends('templayout')
@section('title','Add Product')

@section('content')
<div class="row">

                                                <div class="col-md-10">
                                                    
<form method="post" action="/subcategorystore" >
    @csrf
<div class="form-group">
Category<select name="category" class="form-control"  style="margin-left:20px;">
<option>---select any--</option>
@foreach ($category as $cat)
<option value="{{$cat->id}}">{{$cat->categoryname}}</option> 
@endforeach
</select>
</div>
   Subcategory<input  name="subcategory" id="subcategory" type="text"  class="form-control" style="margin-left:20px;">
 
<input type="submit" name="submit">
</form>
</div>
@endsection

