<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/index.css">
	<link rel="icon" type="image/webp" href="/IMG/favicon.webp"/>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Mot de passe oublié HL</title>
</head>
<body>
<div class="body"></div>
		<div class="grad"></div>
		<div class="header">
			<div>Hogwarts<span>Land</span></div>
		</div>
		<br>
		<div class="login">
		<form method="POST" action="ForgottenPassword.php"><br>
				<input type="text" placeholder="Adresse mail" name="email"><br>
				<button type="submit">Envoyer</button><br><br>
</form>
<div class="popup">
  <div class="popup-content">
    <span class="close">&times;</span>
    <p id="popup-message"></p>
  </div>
</div>

<!-- Le code JavaScript pour afficher la popup en fonction de la valeur de la variable result -->
<script>
  var popup = document.querySelector(".popup");
  var message = popup.querySelector("#popup-message");

  var result = "<?php echo isset($_SESSION['password_reset_result']) ? $_SESSION['password_reset_result'] : ''; ?>";

  if (result === "success") {
    message.innerHTML = "Un nouveau mot de passe vous a été envoyé par e-mail.";
    popup.style.display = "block";
  } else if (result === "error") {
    message.innerHTML = "Cette adresse e-mail ne correspond à aucun compte.";
    popup.style.display = "block";
  }
// Get the close button element
var closeBtn = popup.querySelector(".close");

// Add a click event listener to the close button
closeBtn.addEventListener("click", function() {
  // Hide the popup
  popup.style.display = "none";
});

  // Supprimer la variable de session pour éviter qu'elle ne soit affichée à nouveau
  <?php unset($_SESSION['password_reset_result']); ?>
</script>
<button onclick="window.location.href='pageConnexion.php'" id="insc" style="--color:#CFCF0A;">Retour vers la connexion</button>
</div>
</body>
</html>
