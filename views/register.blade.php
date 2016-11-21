
@extends('layout')

@section('content')

<h1>Registreren</h1>

    <div class="row">
        <form role="form" method="post">
            <div class="col-lg-6">
                <div class="well well-sm"><strong><span class="glyphicon glyphicon-asterisk"></span>Required Field</strong></div>
                <div class="form-group">
                    <label for="txt_voornaam">Voornaam</label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="txt_voornaam" id="First_name" placeholder="Vul een voornaam in" required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="txt_achternaam">Achternaam</label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="txt_tussenvoegsel" id="Prefix" placeholder="Tussenvoegsel (optioneel)">
                        <input type="text" class="form-control" name="txt_achternaam" id="Last_name" placeholder="Vul een achternaam in" required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="txt_gebruikersnaam">Gebruikersnaam</label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="txt_gebruikersnaam" id="Username" placeholder="Vul een gebruikersnaam in" required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="txt_email">Email</label>
                    <div class="input-group">
                        <input type="email" class="form-control" id="Email" name="txt_email" placeholder="Vul een email in" required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="txt_wachtwoord">Wachtwoord</label>
                    <div class="input-group">
                        <input type="password" class="form-control" id="wachtwoord" name="txt_wachtwoord" placeholder="Vul een wachtwoord in">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="txt_wachtwoord2">Herhaal Wachtwoord</label>
                    <div class="input-group">
                        <input type="password" class="form-control" id="wachtwoord" name="txt_wachtwoord2" placeholder="Herhaal Wachtwoord">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                <input type="submit" name="btn-submit" id="submit" value="Submit" class="btn btn-info pull-right">
            </div>
        </form>
    </div>

@endsection
