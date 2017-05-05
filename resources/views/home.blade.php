@extends('layouts.app')

@section('content')
<div class="col-md-10 col-md-offset-1">
  <a href="/profile/{{Auth::user()->id }}"><img src="/uploads/avatars/{{Auth::user()->avatar}}" style="width:150px;height:150px;float:left;border-radius:50%;margin-right:25px"></a>
  <h2> {{Auth::user()->name}} dobro došli na svoj profil.</h2>
  <h1><a  href="{{url('/post/novi')}}">Napisi novi post</a></h1>
</div>
<div class="content" >
@foreach(array_chunk($posts->getCollection()->all(),5) as $row)
<div class="row" >
@foreach($row as $post)
  <div class="panel panel-default" style="width:90%;margin-left:100px;float:left;position:relative;top:20px">
    <div class="panel-heading">{{$post->user->name}}
      @if(Auth::user()->name == $post->user->name)
        <div style="float:right;font-family:sans-serif">
          <a href="/dest/{{$post->id}}" style="text-decoration:none;color:red" >x</a>
        </div>
        <div style="float:right;margin-right:50px;font-family:sans-serif">
          <a href="/post/edit/{{$post->id}}" style="text-decoration:none;color:#bbb" >Edit</a>
        </div>
      @endif
      <a href="/post/{{$post->user->id}}"><img src="/uploads/avatars/{{$post->user->avatar}}" style="width:55px;height:55px;float:left;border-radius:50%;margin-right:25px"></a>
    </div>
    <div class="panel-body">
      {{$post->text}}
    </div>
    <div class="panel-footer">Created by:{{ $post->user->name }} at {{$post->user->created_at}}
      <a href="/kom/{{$post->id}}" style="float:right;position:relative;margin-right:45px">Komentari</a>
    </div>
  </div>
  </div><br>
@endforeach
@endforeach
</div>
{{$posts->links()}}
@endsection
