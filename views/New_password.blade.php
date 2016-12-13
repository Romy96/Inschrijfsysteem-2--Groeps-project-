<!doctype html>
<html>
<head>
	<link href="css/style.css" rel="stylesheet">
	<title>Nieuw wachtwoord</title>
	<script src="https://use.fontawesome.com/bf8ab24a40.js"></script>
	<link rel="stylesheet" href="css/bootstrap.min.css">
</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
						<h1>Aanvraag nieuwe wachtwoord</h1>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6 col-sm-offset-3">
					<p>Beste {{$Gebruikersnaam}}</p>
					<p>U heeft een aanvraag gedaan voor een nieuwe wachtwoord</p>
					<p>Klik op dit link onder deze tekst om een nieuwe wachtwoord in te vullen</p>
					<a href="http://localhost/insert_new_password.php?Gebruikersnaam={{$Gebruikersnaam}}">Validation link</a>
				</div><!--/col-sm-6-->
			</div><!--/row-->
		</div>
	</body>
</html>