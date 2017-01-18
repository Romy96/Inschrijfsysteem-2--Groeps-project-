@extends('backend/menu')

@section('content_backend')

<h1>Members</h1>



    <div class="row">
    		<div class="row">
                <div class="btn-group pull-right" style="margin: 0 15px 15px 0;">
                    <a href="create_user.php" class="btn btn-primary btn-flat" style="padding: 4px 10px;">
                        <i class="fa fa-pencil"></i> Nieuwe gebruiker
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
                            <th>Naam</th>
                            <th>Email</th>
                            <th>Gebruiker of beheerder</th>
                            <th data-sortable="false">Acties</th>
                        </tr>
                        </thead>
                        <tbody>

                        @if(isset($users))
                            @foreach($users as $row)
                                <tr>
                                    <td>
                                        {{$row['id']}}
                                    </td>
                                    <td>
                                        {{$row['gebruikersnaam']}}
                                    </td>
                                    <td>
                                    	{{$row['email']}}
                                    </td>
                                    <td>
                                    	{{$row['isAdmin']}}
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                        	<a href="Edit_user.php?id={{$row['id']}}" class="btn btn-default btn-flat"><i class="fa fa-pencil"></i></a>
                                            <a href="Delete_user_action.php?id={{$row['id']}}" onclick="return confirm('Weet je het zeker?')" class="btn btn-danger btn-flat"><i class="fa fa-trash"></i></a>
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


@endsection