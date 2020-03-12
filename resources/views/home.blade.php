@extends('layouts.app')

@section('content')
<p>Date: <input type="text" id="datepicker"></p>
<hr>
<div id="resultText"></div>
@if(count($posts) > 0)  
  @foreach($posts as $post)
  	<div id="postContent">
  		
		 <div class="card" style="width:400px">
		  <img class="card-img-top" src="{{$post->featured}}" alt="Card image">
		  <div class="card-body">
		    <h4 class="card-title">{{$post->title}}</h4>
		    <p class="card-text">{{$post->content}}</p>
		    
		  </div>
		</div>
	</div>
	<br>
	@endforeach
@else
	<h2 class="text-center">No Post Found</h2>
@endif  

@endsection
