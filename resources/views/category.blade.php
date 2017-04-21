

@extends('welcome')
@section('content')

<h3>{{$category->name}}</h3>
<ul id="list">
@foreach ($category->articles as $article)
<li><a href="{{route("article.get", ["id"=>$article->id])}}">{{$article->title}}</a></li>
 @endforeach

 
</ul>
<form method="POST" action="{{route("article.post")}}">
  <div class="form-group">
    <label>Article title</label>
    <input id="article" name="title" type="text" class="form-control" placeholder="...">
    
  </div>
    <div class="form-group">
    <label>Content</label>
    <textarea id="textarea" name="content" type="text" class="form-control" rows="15" placeholder="..."></textarea>
  </div>
    
    <input id= "content" name="category_id" type="hidden" class="form-control" value="{{$category->id}}">
  <div class="btn-group" role="group" aria-label="...">
      <button id="b1" disabled="" type="submit" class="btn btn-default">Create</button>
    <button type="button" onclick="showarts()" class="btn btn-default">Show</button>
    <button id="b2" disabled="" type="reset" onclick="cancel()" class="btn btn-default">Cancel</button>
    
    
  </div>
</form>

<script>
function showarts(){
//    $("button").click(function(){
        $.get("<?php echo route("xhr.category.get", ["id" => $category->id]) ?>", function(data, status){
        for(var i=0;i<data.length;i++) {
        $("#list").append('<li><a href="/article"'+data[i].id+'">'+data.title+'</a></li>');
    }
//        alert("Data: " + data + "\nStatus: " + status);
        });
 //   });
 };
title=$('#article').val();
        content=$('#textarea').val();
  $('#article,#textarea').on('keyup',function(){
        title=$('#article').val();
        content=$('#textarea').val();
        if (title.length>0 && content.length>0)
        {
            $('#b1').removeAttr('disabled');
            $('#b2').removeAttr('disabled');
        }
            
        else if (title.length===0 || content.length===0  )
        {
            $('#b1').attr('disabled','true');
            $('#b2').attr('disabled','true');
             
            
        }
            
     
            
        
        
    });

       
   function cancel() {
  
             $('#b1').attr('disabled','true');
            $('#b2').attr('disabled','true');
      
    };
        
    
  
</script>
 

@stop

