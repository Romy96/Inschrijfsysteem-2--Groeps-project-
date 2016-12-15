@extends('layout')

@section('content')

	@foreach ( $events as $event )
		<div class='banner' style='background-image:url({{$event['large_banner_url']}})'>	
			<h1 class='title'>{{$event['title']}}</h1>
		</div>
	@endforeach

	@foreach ( $activities as $activity ) 
	<div> 
		<form method="POST" action="select_action.php">
		    <div class='img' style='background-image:url({{$activity['banner_url']}})'>
			    <div class='img2'>
				    <p class='data_info'>{{$activity['title']}}</p> 
				    <p class='data_info'>{{$activity['description']}}</p>
				    <input type="hidden" name="activity_id" value="{{$activity['id']}}" />
			    </div>
		    	<input type="submit" name="submit" id="submit" value="Select" class="btn btn-info pull-right">
		    </div>
	    </form>	
    </div>
	@endforeach


	

@endsection