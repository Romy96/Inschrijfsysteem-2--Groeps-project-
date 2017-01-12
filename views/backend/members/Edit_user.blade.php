@extends('Backend/menu')


@section('content_backend')

@if(isset($user))

<h1>Bewerken account</h1>

    <form role="form" method="post" action="Edit_user_action.php">
        <div class="row">
            <div class="col-md-12">
                <div class="nav-tabs-custom">   <!-- white background -->
                    <div class="box-body">      <!-- some whitespace -->
                        <div class="box-body">      <!-- some more whitespace -->
                                <div class='form-group'>
                                    <input type="hidden" name="id" value="{{$user['id']}}">
                                     <label for="txt_voornaam">Wil je dat iemand het account gebruikt als beheerder of gebruiker?</label>
				                    <div class="input-group">
				                        <label class="checkbox-inline"><input type="checkbox" id="ja" name="ja" value="1">Beheerder</label>
				                        <label class="checkbox-inline"><input type="checkbox" id="nee" name="nee" value="0">Gebruiker</label>
				                    </div>
                				</div>
				                <div class="form-group">
				                    <label for="txt_voornaam">Voornaam</label>
				                    <div class="input-group">
				                        <input type="text" class="form-control" id="voornaam" name="voornaam" value="{{$user['voornaam']}}" required>
				                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
				                    </div>
				                </div>
				                <div class="form-group">
				                    <label for="txt_achternaam">Achternaam</label>
				                    <div class="input-group">
				                        <input type="text" class="form-control" name="tussenvoegsel" id="tussenvoegsel" value="{{$user['voorvoegsel']}}">
				                        <input type="text" class="form-control" name="achternaam" id="achternaam" value="{{$user['achternaam']}}" required>
				                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
				                    </div>
				                </div>
				                <div class="form-group">
				                    <label for="txt_gebruikersnaam">Gebruikersnaam</label>
				                    <div class="input-group">
				                        <input type="text" class="form-control" name="gebruikersnaam" id="gebruikersnaam" value="{{$user['gebruikersnaam']}}" required>
				                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
				                    </div>
				                </div>
				                <div class="form-group">
				                    <label for="txt_email">Email</label>
				                    <div class="input-group">
				                        <input type="email" class="form-control" id="email" name="email" value="{{$user['email']}}" required>
				                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
				                    </div>
				                </div>
				                 <div class="box-footer">
				                        <button type="submit" class="btn btn-primary btn-flat">Opslaan</button>
				                 </div>
                		</div>      <!-- /nav-tabs-custom -->
            		</div>      <!-- /col-md-12 -->
       	 	</div> 
       	</div>     <!-- /row -->
  	</form>
@endif



@endsection