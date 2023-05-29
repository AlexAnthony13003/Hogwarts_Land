<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/index.css">
	<link rel="icon" type="image/webp" href="/IMG/favicon.webp"/>
    <title>Inscription</title>
</head>
<body>
<div class="body"></div>
		<div class="grad"></div>
		<div class="header">
			<div>Hogwarts<span>Land</span></div>
		</div>
		<div class="SignIn">
<form method="POST" action="Inscription.php">
				<input type="text" placeholder="Nom" name="nom"><required><br>
				<input type="text" placeholder="Prenom" name="prenom"><required><br>
				<input type="date" placeholder="Date de naissance" name="dateNaiss"><required><br>
				<input type="text" placeholder="Adresse Mail" name="mail"><required><br>
				<input type="text" placeholder="Nom d'utilisateur" name="username"><required><br>
				<input type="password" placeholder="Mot de passe" name="password"><required><br>
				<button type="submit">S'inscrire</button><br>
		
</form>
<button onclick="window.location.href='pageConnexion.php'" id="insc" style="--color:#CFCF0A;">Déjà inscrit ?</button>
</div>
</body>
</html>