<!DOCTYPE html>
<html>
<head>
	<link href="css/style.css" rel="stylesheet" type="text/css">
	<title>{{$title}}</title>
</head>
<body>

<form action="register_action.php" method="post">
    <label for="username">
    <input type="text" name="email" id="email" required="required" />
	</label>
    

    <label>
    <input type="password" name="password" id="password" required="required" />
    </label>


    <div class="clear"></div>
    <input id ="submit" type="submit" value="register" name="submit"  />
</form>
</section>
</body>
</html>