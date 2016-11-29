@extends('layout')

@section('content')

	@foreach ( $event as $row )
		<div class='banner' style='background-image:url({{$row['large_banner_url']}})'>	
			<h1 class='title'>{{$row['title']}}</h1>
		</div>
	@endforeach

	@foreach ( $activities as $rows ) 
	<div>
	<form role="form" method="post" action="select_action.php">
	    <div class='img' style='background-image:url({{$rows['banner_url']}})'>
		    <div class='img2'>
		    <p class='data_info'>{{$rows['title']}}</p> 
		    <p class='data_info'>{{$rows['description']}}</p>
		    <p class='data_info'>{{$rows['id']}}</p>
	    </div>
	    <input type="submit" name="btn-submit" id="submit" value="Select" class="btn btn-info pull-right">
    </div>	
	@endforeach
	

@endsection