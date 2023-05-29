<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/index.css">
	<link rel="icon" type="image/webp" href="/IMG/favicon.webp"/>
    <title>Connexion HL</title>
</head>
<body>
<div class="body"></div>
		<div class="grad"></div>
		<div class="header">
			<div>Hogwarts<span>Land</span></div>
		</div>
		<br>
		<div class="login">
		<form method="POST" action="Connexion.php" >
				<input type="text" placeholder="Nom d'utilisateur" name="username"><br>
				<input type="password" placeholder="Mot de passe" name="password"><br>
				<button type="submit">Se Connecter</button><br>
		
</form>
<button onclick="window.location.href='PageForgottenPassword.php'" id="insc" style="--color:#e6e6b1;">Mot de passe oublié ?</button>
<button onclick="window.location.href='PageInscription.php'" id="insc" style="--color:#CFCF0A;">Pas encore inscrit ?</button>
</div>
</body>
</html>
