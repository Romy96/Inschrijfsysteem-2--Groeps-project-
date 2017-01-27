@extends('layout')

@section('content')

<h1>Registreren</h1>

    <div class="row">
        <form role="form" method="post" action="register_action.php">
            <div class="col-lg-6">
                <div class="well well-sm"><strong><span class="glyphicon glyphicon-asterisk"></span>Required Field</strong></div>
                <div class="form-group">
                    <label for="txt_voornaam">Voornaam</label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="voornaam" name="voornaam" placeholder="Vul een voornaam in" required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="txt_achternaam">Achternaam</label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="tussenvoegsel" id="tussenvoegsel" placeholder="Tussenvoegsel (optioneel)">
                        <input type="text" class="form-control" name="achternaam" id="achternaam" placeholder="Vul een achternaam in" required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="txt_gebruikersnaam">Gebruikersnaam</label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="gebruikersnaam" id="gebruikersnaam" placeholder="Vul een gebruikersnaam in" required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="txt_email">Email</label>
                    <div class="input-group">
                        <input type="email" class="form-control" id="email" name="email" placeholder="Vul een email in" required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="txt_wachtwoord">Wachtwoord</label>
                    <div class="input-group">
                        <input type="password" class="form-control" id="wachtwoord" name="wachtwoord" placeholder="Wachtwoord moet minimaal 8 tekens lang zijn">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                <div class="form-group">
                    <input type="hidden" name="validation_token">
                    <label for="txt_wachtwoord2">Herhaal Wachtwoord</label>
                    <div class="input-group">
                        <input type="password" class="form-control" id="wachtwoord" name="wachtwoord2" placeholder="Herhaal Wachtwoord">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                <div id="pswd_info" style="display: none;">
                    <h4>Password must meet the following requirements:</h4>
                    <ul>
                        <li id="letter" class="invalid">At least <strong>one letter</strong></li>
                        <li id="capital" class="invalid">At least <strong>one capital letter</strong></li>
                        <li id="number" class="invalid">At least <strong>one number</strong></li>
                        <li id="length" class="invalid">Be at least <strong>8 characters</strong></li>
                    </ul>
                </div>
                <button class="pwd_req" id="button" onclick="ShowDiv()"></button>
                <input type="submit" name="btn-submit" id="submit" value="Submit" class="btn btn-info pull-right">
            </div>
        </form>
    </div>

@endsection