<?php
include 'navbar.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script
    src="https://cdnjs.cloudflare.com/ajax/libs/velocity/1.2.3/velocity.min.js">
</script>
<script
    src="https://cdnjs.cloudflare.com/ajax/libs/velocity/1.2.3/velocity.ui.min.js">
    </script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/webp" href="/IMG/favicon.webp"/>
    <link rel="stylesheet" href="css/mainVeritable.css">
    <script src="JS/script.js"></script>
    <title>Accueil HL</title>
</head>
<body>
  <?php
session_start();
if (!isset($_SESSION['username'])) {
  // L'utilisateur n'est pas connecté, rediriger vers la page de connexion
  header('Location: pageConnexion.php');
  exit();
}
else{ 
  ?>
<div class="header">
        <h1><?php
                if($_SESSION['username'] !== ""){
                    $user = $_SESSION['username'];
                    ?>
                    <?php echo "Bienvenue $user !";?>
                    <?php 
                }
            ?></h1>
            <div class="symbol">
            <div class="deathly"></div>
            <div class="hallows"></div>
            </div>
            <div>Hogwarts<span>Land</span></div><br>
            <h2> <i> Rejoignez le communauté la plus puissante du monde d'Harry Potter</i></h2> <br><br><br><br>
        <a class="quizzBtn" href="quizz.php" style="--color:#CFCF0A;">Commencer maintenant</a>
      </div>

<a class="buttonDeco" href="logout.php" style="--color:#d4d4d4;">Deconnexion</a>
  <?php
  if ($_SESSION['isAdmin'] == 1) { 
  ?>
  <a class="backoffice" href="backoffice.php" style="--color:#CFCF0A;">backoffice</a>
    <?php
  }

    ?>
<?php
}
?>
</body>
</html>