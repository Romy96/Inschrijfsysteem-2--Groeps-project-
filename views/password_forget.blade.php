@extends('layout')

@section('content')

<h1>Wachtwoord vergeten?</h1>
	
    <div class="row">
        <form role="form" method="get" action="password_forget_action.php">
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="email">Vul uw email opnieuw in</label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="email" id="email" placeholder="Enter email" required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                <input type="submit" name="submit" id="submit" value="Submit" class="btn btn-info pull-right">
            </div>
        </form>
      </div>

@endsection