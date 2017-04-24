

@extends('welcome')
@section('content')
<h3>{{$article->title}}</h3>
<form method="POST" action="{{route("article.get")}}">
  <div class="form-group">
   
      <textarea  name="content" disabled="true" type="text" class="form-control" rows="15" >{{$article->content}}</textarea>
    <div class="btn-group" role="group" aria-label="...">
<button onClick="javascript:history.go(-1)" type="button" class="btn btn-default">Return</button>
    </div>
 
</form>
@stop