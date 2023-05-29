<?php
include 'navbar.php'
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" type="image/webp" href="/IMG/favicon.webp"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script
    src="https://cdnjs.cloudflare.com/ajax/libs/velocity/1.2.3/velocity.min.js">
    </script>
    <script
    src="https://cdnjs.cloudflare.com/ajax/libs/velocity/1.2.3/velocity.ui.min.js">
    </script>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/mainVeritable.css">
    <script src="JS/script.js"></script>
    <title>Competition HL</title>
</head>
  <?php
  session_start();
  if (!isset($_SESSION['username'])) {
    // L'utilisateur n'est pas connecté, rediriger vers la page de connexion
    header('Location: pageConnexion.php');
    exit();
}

else{
  $_SESSION["competition"]= 0;
  $_SESSION["isTrue"]= 0;
  ?>
    
<body class="quizz">
<div class="contenu">
    <h1>Quiz Competitif</h1>
    <a class="compet" href="QuizzCompet.php">
        <input type="button" value="Competition">
    </a>
    <a class="classement" href="classement.php">
        <input type="button" value="Classement Général">
    </a>
</div>
  <?php
}
?>
</body>
</html>