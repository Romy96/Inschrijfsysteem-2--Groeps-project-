
@extends('layout')

@section('content')

<h1>Registreer</h1>

    <div class="row">
        <form role="form" method="post" action="register_action.php">
            <div class="col-lg-6">
                <div class="well well-sm"><strong><span class="glyphicon glyphicon-asterisk"></span>Required Field</strong></div>
                <div class="form-group">
                    <label for="First_name">Voornaam</label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="First_name" id="First_name" placeholder="Enter your first name" required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="Insertion">Tussenvoegsel</label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="Insertion" id="Insertion" placeholder="Enter email" required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="Last_name">Achternaam</label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="Last_name" id="Last_name" placeholder="Enter your last name" required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="Email">Email</label>
                    <div class="input-group">
                        <input type="email" class="form-control" name="Email" id="Email" placeholder="Enter email" required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="pwd">Password</label>
                    <div class="input-group">
                        <input type="password" class="form-control" id="pwd" name="pwd" placeholder="Enter password">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                <input type="submit" name="submit" id="submit" value="Submit" class="btn btn-info pull-right">
            </div>
        </form>
    </div>

@endsection
