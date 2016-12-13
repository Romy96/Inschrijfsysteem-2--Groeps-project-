@extends('layout')

@section('content')

<h1>Wachtwoord vergeten?</h1>
	
    <div class="row">
        <form role="form" method="get" action="password_forget_action.php">
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="gebruikersnaam">Gebruikersnaam</label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="gebruikersnaam" id="gebruikersnaam" placeholder="Enter username" required>
                        <small class="form-text text-muted">Maak eerst een account aan voordat u deze formulier invuld</small>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <div class="input-group">
                        <input type="email" class="form-control" name="email" id="email" placeholder="Enter email" required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                <input type="submit" name="submit" id="submit" value="Submit" class="btn btn-info pull-right">
            </div>
        </form>
      </div>

@endsection