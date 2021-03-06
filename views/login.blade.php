@extends('layout')

@section('content')

<h1>Inloggen</h1>

    <div class="row">
        <form role="form" method="POST" action="login_action.php">
            <div class="col-lg-6">
                <div class="well well-sm"><strong><span class="glyphicon glyphicon-asterisk"></span>Verplicht veld</strong></div>
                <div class="form-group">
                    <label for="Email">Email</label>
                    <div class="input-group">
                        <input type="email" class="form-control" id="email" name="email"  placeholder="Enter email" required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="pwd">Wachtwoord</label>
                    <div class="input-group">
                        <input type="password" class="form-control" id="wachtwoord" name="wachtwoord" placeholder="Enter password">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                <div class="form-group">        
                    <a href="password_forget.php">Wachtwoord vergeten?</a>
                </div>
                  <input name="remember" type="checkbox" value="checked"> Onthoud mij <br>
                <input type="submit" name="submit" id="submit" value="Submit" class="btn btn-info pull-right">
            </div>
        </form>
    </div>

@endsection
