<!DOCTYPE html>
@extends('layouts.app')

@section('post')

<html>
  <head>
    <meta charset="utf-8">

    <title></title>
  </head>
  <body>
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>

    <div class="content">
        <div class="title m-b-md">
        <form  id="forma" action="/post/novi" method="post">
          {!! csrf_field() !!}
          <div class="form-group">
                <label for="text">Napišite svoj post:</label>
                <textarea form="forma" name="text" class="form-control" rows="5" id="text"></textarea>
          </div>
          <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
          <button type="submit" name="button">Postavi</button>
        </form>
        </div>
        
    </div>
  </body>
</html>
@endsection
