@extends('templayout')

@section('pagetitle','list')
@section('content')
<div class="row">

                                                <div class="col-md-6">

<h2>product list</h2>
    <hr>
    <table ><tr><td>Itemname</td><td>Category</td><td>subcategory</td><td>Description</td><td>Colour</td><td>Amount</td><td>Filename</td></tr><!--  -->
  

    @foreach ($product as $pro)
   
   
   <tr><td>{{$pro->itemname}}</td><td>{{$pro->categoryname}}</td><td>{{$pro->subcategoryname }}</td><td>{{$pro->description}}</td><td>{{$pro->colourname}}</td><td>{{$pro->amount}}</td><td>{{$pro->features}}</td><td><img src="{{ asset('storage/'.$pro->filename) }}" width=100px height=100px></td><td><a  class="btn btn-primary mb-2" href="{{route('products.edit',$pro->id)}}">edit</a>
  </td>
<td>  <a href="{{ url('download?path=public/'.$pro->filename)}}"  class="btn btn-primary mb-2">Download</a></td>
 

   <td> <form method="post" action="{{route('products.destroy',$pro->id)}}">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-primary mb-2">Delete</button>
                            
                        </form></td>
</tr>   @endforeach   

</table>
        
@endsection
