
@extends('templayout')
@section('title','Add Product')

@section('content')
<div class="row">

                                                <div class="col-md-10">
                                                     
<form method="post" action="{{route('products.store')}}" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
Product name<input name="itemname" type="text" id="itemname" class="form-control" style="margin-left:20px;">
</div>
<div class="form-group">
Category<select name="category"type="text" id="category" class="form-control" style="margin-left:20px;">
<option>---select any--</option> 

@foreach ($category as $cat)
<option value="{{$cat->id}}">{{$cat->categoryname}}</option> 
@endforeach
</select>
</div>
 <div class="form-group">
Subcategory<select name="subcategory" type="text" id="subcategory" class="form-control" style="margin-left:20px;">
<option >---select any--</option>
</select>
</div>
<div class="form-group">
Description<textarea name="description" class="form-control" id="description" style="margin-left:20px;"> </textarea>
</div>
<div class="form-group">

Colour<select name="colour" id="colour" type="text" class="form-control"   style="margin-left:20px;">
 

<option>----select any--</option>
@foreach ($colour as $col)
<option value="{{$col->id}}">{{$col->colourname}}</option> 
@endforeach
</select>
</div>
<div class="form-group">

Amount<input name="amount" id="amount" type="text" class="form-control" style="margin-left:20px;">
</div>

<div class="form-group ">
<h6>Features</h6>  
@foreach ($feature as $fet)
 <input type="checkbox" name="features[{{$fet->id}}]" id="features[{{$fet->id}}]"   checked="false" style="margin-left:20px;">
 {{$fet->featurename}}
 @endforeach
 </div>
<!-- name,id is not that important for feature -->
 Upload primary image <input required type="file"  class="custome-file-input" name="productimage"    ><br>
Upload subimages <input required type="file"  class="custome-file-input" name="image[]"   multiple >

<input type="submit" name="submit">
</form>
</div>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {    
        $("#category").change(function(){
            var categoryId = $(this).val();
            if(categoryId){
                $.ajax({
                    type:'GET',
                    url:'{{ route("subcategoryselect") }}',
                    data:{"id" : categoryId },
                    success:function(res){
                        $("#subcategory").empty();
                        $("#subcategory").append('<option>--Select subcategory--</option>');
                        $.each(res,function(key,value){
                            $("#subcategory").append('<option value="'+value.id+'">'+value.subcategoryname+'</option>');
                        });
                    }
                }); 
            }
        });
         });

    </script>