
<meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<div class="row">

                                                <div class="col-md-6">

<h2>Product List</h2>
    <hr>


    <div class="container">
 
    <table class="table table-bordered data-table" id="table">
        <thead>
            <tr>
            <th>id</th>
                <th>Itemname</th>
                <th>Desription</th>
                <th>colour</th>

                <th>Amount</th>
                <th>Category</th>
                <th>Filename</th>


                <th width="100px">Action</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>

    <!-- <table  id="table"><tr><td>Itemname</td><td>description</td><td>colour</td><td>amount</td><td>Category</td><td>Filename</td></tr>
  

    
</table> -->
</div>       
<!-- <script type="text/javascript">
  $(function () {
    
    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('products.getproducts') }}",
        columns: [
            {data: 'id', name: 'id'},
            {data: 'itemname', name: 'itemname'},
            
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
    
  });
</script>
-->
  <script type="text/javascript">
         $(function() {
               $('#table').DataTable({
               processing: true,
               serverSide: true,
               ajax: '{{ route('products.getproducts') }}',
               columns: [
                { data: 'id', name: 'id' },
                        { data: 'itemname', name: 'itemname' },
                        { data: 'description', name: 'description' },
                        { data: 'colour', name: 'colour' },
                        { data: 'amount', name: 'amount' },
                        { data: 'category', name: 'category' },
                        { data: 'filename', name: 'filename' }
                      
                      
                        ]
            });
         });
         </script>
