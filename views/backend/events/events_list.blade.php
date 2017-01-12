@extends('backend/menu')

@section('content_backend')

<h1>Evenementen</h1>


    <div class="row">
        <div class="col-xs-12">
            <div class="row">
                <div class="btn-group pull-right" style="margin: 0 15px 15px 0;">
                    <a href="create_event.php" class="btn btn-primary btn-flat" style="padding: 4px 10px;">
                        <i class="fa fa-pencil"></i> Nieuwe evenement
                    </a>
                </div>
            </div>

            <div class="box box-primary">
                <div class="box-header">
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table class="data-table table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>Sorteer</th>
                            <th>Evenement</th>
                            <th>Afbeelding achtergrond</th>
                            <th>Banner</th>
                            <th>Startdatum</th>
                            <th>Einddatum</th>
                            <th data-sortable="false">Acties</th>
                        </tr>
                        </thead>
                        <tbody>

                        @if(isset($events))
                            @foreach($events as $row)
                                <tr>
                                    <td>
                                        <a href="event_activities.php?id={{$row['id']}}">
                                            {{$row['id']}}
                                        </a>
                                    </td>
                                    <td>
                                        <a href="event_activities.php?id={{$row['id']}}">
                                            {{$row['title']}}
                                        </a>
                                    </td>
                                    <td>
                                    	<img class="img-thumbnail background-img" src="{{$row['small_banner_url']}}">
                                    </td>
                                    <td>
                                    	<img class="img-thumbnail banner-img" src="{{$row['large_banner_url']}}">
                                    </td>
                                    <td>
                                        <a href="event_activities.php?id={{$row['id']}}">
                                            {{$row['start_date']}}
                                        </a>
                                    </td>
                                    <td>
                                        <a href="event_activities.php?id={{$row['id']}}">
                                            {{$row['end_date']}}
                                        </a>
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="Edit_event.php?id={{$row['id']}}" class="btn btn-default btn-flat"><i class="fa fa-pencil"></i></a>
                                            <a href="Delete_event_action.php?id={{$row['id']}}" class="btn btn-danger btn-flat"><i class="fa fa-trash"></i></a>
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