@extends('backend/menu')

@section('content_backend')

@foreach ( $event as $row )  
        <h1>{{$row['title']}}</h1>



    <div class="row">
        <div class="col-xs-12">
            <div class="row">
                <div class="btn-group pull-right" style="margin: 0 15px 15px 0;">
                    <a href="create_activity.php?id={{$row['id']}}" class="btn btn-primary btn-flat" style="padding: 4px 10px;">
                        <i class="fa fa-pencil"></i> Nieuwe activiteit
                    </a>
                </div>
            </div>
@endforeach

            <div class="box box-primary">
                <div class="box-header">
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table class="data-table table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>Sorteer</th>
                            <th>Activiteit</th>
                            <th>Afbeelding</th>
                            <th>Beschrijving</th>
                            <th data-sortable="false">Acties</th>
                        </tr>
                        </thead>
                        <tbody>

                        @if(isset($activities))
                            @foreach ( $activities as $rows ) 
                                <tr>
                                    <td>
                                        {{$rows['id']}}
                                    </td>
                                    <td>
                                        {{$rows['title']}}
                                    </td>
                                    <td>
                                        <img class="img-thumbnail background-img"  src="{{$rows['banner_url']}}">
                                    </td>
                                    <td>
                                        {{$rows['description']}}
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="edit_activity.php?id={{$rows['id']}}" class="btn btn-default btn-flat"><i class="fa fa-pencil"></i></a>
                                            <a href="delete_activity_action.php?id={{$rows['id']}}&events_id={{$rows['event_id']}}" onclick="return confirm('Weet je het zeker?')" class="btn btn-danger btn-flat"><i class="fa fa-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @endif


                        </tbody>
                    </table>
                </div>

            </div>


        </div>
    </div>

@endsection