@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <img src="/uploads/avatars/{{$user->avatar}}" style="width:150px;height:150px;float:left;border-radius:50%;margin-right:25px">
      <h2> {{$user->name}} dobro došli na svoj profil.</h2>

      <form action="/profile" method="post" enctype="multipart/form-data">
        {!! csrf_field() !!}
        <label>Učitaj sliku</label>
      <input type="hidden" name="_token" value="{{csrf_token()}}">
      <input type="file" name="avatar" required><br>
      <input type="submit" class="pull-right btn btn-sm btn-primary">
    </form>
    </div>
  </div>
</div>
@endsection
