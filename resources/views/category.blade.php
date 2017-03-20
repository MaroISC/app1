<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
</head>
<body>
<h3>{{$category->name}}</h3>
<ul id="list">
<!--@foreach ($category->articles as $article)
<li><a href="{{route("article.get", ["id"=>$article->id])}}">{{$article->title}}</a></li>
 @endforeach -->

</ul>
<form method="POST" action="{{route("article.post")}}">
  <div class="form-group">
    <label>Article title</label>
    <input name="title" type="text" class="form-control" placeholder="...">
  </div>
    <div class="form-group">
    <label>Content</label>
    <textarea name="content" type="text" class="form-control" rows="15" placeholder="..."></textarea>
  </div>
    <input name="category_id" type="hidden" class="form-control" value="{{$category->id}}">
  <div class="btn-group" role="group" aria-label="...">
    <button type="submit" class="btn btn-default">Create</button>
    <button type="reset" class="btn btn-default">Cancel</button>
  </div>
</form>

<script>
$(document).ready(function(){
//    $("button").click(function(){
        $.get("<?php echo route("xhr.category.get", ["id" => $category->id]) ?>", function(data, status){
        for(var i=0;i<data.length;i++) {
        $("#list").append("<li>"+data[i].title+"</li>");
    }
//        alert("Data: " + data + "\nStatus: " + status);
        });
 //   });
 });

</script>
</body>
</html>