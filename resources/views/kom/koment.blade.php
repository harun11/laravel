@extends('layouts.app')

@section('content')

<div class="panel panel-default" style="width:90%;margin-left:100px;float:left;position:relative;top:20px">
    <div class="panel-heading">{{$post->user->name}}
      <img src="/uploads/avatars/{{$post->user->avatar}}" style="width:55px;height:55px;float:left;border-radius:50%;margin-right:25px">
    </div>
    <div class="panel-body">
      {{$post->text}}
    </div>
    <div class="panel-footer">Created by:{{ $post->user->name }} at {{$post->user->created_at}}
    </div>
</div>
<div class="content">
  <h3>Komentari:</h3>
  @foreach($kom as $test)
    <div class="panel panel-default" style="width:60%;margin-left:100px;float:left;position:relative;top:20px">
        <div class="panel-heading">{{$test->user->name}}
            <img src="/uploads/avatars/{{$test->user->avatar}}" style="width:55px;height:55px;float:left;border-radius:50%;margin-right:25px">
        </div>
        <div class="panel-body">
            {{$test->komentar}}
        </div>
        <div class="panel-footer">Created by:{{ $test->user->name }} at {{$test->created_at}}
        </div>
    </div>
  @endforeach
</div>
<div class="form-group" style="position:relative">
  <form  id="forma" action="/kom/{{$post->id}}" method="post">
    {!! csrf_field() !!}
  <textarea form="forma" name="komentar" class="form-control" rows="1" style="width:40%;position:relative;left:120px" id="komentar" placeholder="Komentar..." ></textarea>
  <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
  <input type="hidden" name="post_id" value="{{ $post->id }}">
  <input type="submit" name="button"  value="Komentiraj" style="position:relative;left:660px;top:-30px">
</form>
</div>
@endsection
