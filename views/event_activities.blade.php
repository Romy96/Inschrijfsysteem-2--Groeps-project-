@extends('layout')

@section('content')

	@foreach ( $event as $row )
		<div class='banner' style='background-image:url({{$row['large_banner_url']}})'>	
			<h1 class='title'>{{$row['title']}}</h1>
		</div>
	@endforeach

	@foreach ( $activities as $rows ) 
	<div>
	    <div class='img' style='background-image:url({{$rows['banner_url']}})'>
		    <div class='img2'>
		    <p class='data_info'>{{$rows['title']}}</p> 
		    <p class='data_info'>{{$rows['description']}}</p>
		    </div>
	    </div>
    </div>	
	@endforeach
	

@endsection