<form method="post" action="{{route('products.login')}}" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
email<input name="email"  type="text" id="email" class="form-control" style="margin-left:20px;">
<div class="form-group">
Password<input name="password"  type="text" id="password" class="form-control" style="margin-left:20px;">
</div>
<input type="submit" name="submit">