@extends('layout')

@section('content')

@if(isset($user))

<h1>Nieuw wachtwoord</h1>
	
    <div class="row">
        <form role="form" method="get" action="new_password_action.php">
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="gebruikersnaam">Gebruikersnaam</label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="gebruikersnaam" id="gebruikersnaam" value="{{$user['gebruikersnaam']}}" placeholder="Enter username" disabled>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="nieuw_wachtwoord_1">Nieuw wachtwoord</label>
                    <div class="input-group">
                        <input type="password" class="form-control" name="nieuw_wachtwoord_1" id="nieuw_wachtwoord_1" placeholder="Enter new password" required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="nieuw_wachtwoord_2">Vul nog een keer uw nieuwe wachtwoord in</label>
                    <div class="input-group">
                        <input type="password" class="form-control" name="nieuw_wachtwoord_2" id="nieuw_wachtwoord_2" placeholder="Enter your new password once more" required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                <input type="submit" name="submit" id="submit" value="Submit" class="btn btn-info pull-right">
            </div>
        </form>
      </div>
@endif

@endsection