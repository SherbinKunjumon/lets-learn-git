@extends('templayout')
@section('title','Add Product')

@section('content')
<div class="row">

                                                <div class="col-md-10">
                                                    
<form method="post" action="/storeimage" enctype="multipart/form-data">
    @csrf
   Upload multiple image <input required type="file"  class="custome-file-input" name="image[]" multiple   >
 
<input type="submit" name="submit">
</form>
</div>
@endsection

