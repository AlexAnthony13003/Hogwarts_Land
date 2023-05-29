<?php
include 'navbar.php'
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php
  session_start();
  $_SESSION['gryff']=0;
  $_SESSION['slyth']=0;
  $_SESSION['serd']=0;
  $_SESSION['pouf']=0;
  $_SESSION['harry']=0;
  $_SESSION['ron']=0;
  $_SESSION['hermione']=0;
  $_SESSION['neuville']=0;
  $_SESSION['voldi']=0;
  $_SESSION['drago']=0;
  $_SESSION['dumbi']=0;
  $_SESSION['rog']=0;
  $_SESSION['luna']=0;
  $_SESSION['gin']=0;
  $_SESSION['index'] = 0;
  $_SESSION['indexperso'] = 0;
  $_SESSION['indexpatro'] = 0;
  $_SESSION['cerf']=0;
  $_SESSION['biche']=0;
  $_SESSION['loutre']=0;
  $_SESSION['chien']=0;


  if (!isset($_SESSION['username'])) {
    // L'utilisateur n'est pas connecté, rediriger vers la page de connexion
    header('Location: pageConnexion.php');
    exit();
}

else{
  ?>
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
    <title>Quizz HL</title>
</head>
<body class="quizz">
<div class="contenu">
    <h1>Quiz de personnalité</h1>
    <a class="maison" href="QuizzMaison.php">
        <input type="button" value="Maison">
    </a>
    <a class="perso" href="QuizzPersonnage.php">
        <input type="button" value="Personnage">
    </a>
    <a class="patronus" href="QuizzPatronus.php">
        <input type="button" value="Patronus">
    </a>
</div>
  <?php
}
?>
</body>
</html>