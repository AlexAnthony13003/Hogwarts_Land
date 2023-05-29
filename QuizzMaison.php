<?php
   include 'commands/SQL.php';
   $bdd = connectDB();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/webp" href="/IMG/favicon.webp"/>
    <link rel="stylesheet" href="css/quizz.css">
    <script src="JS/animation.js"></script>
    <title>Quizz Maison</title>
</head>
<body class="quizzMaison">
  
    <h1>Quizz Maison</h1>
    <?php 
    session_start();
    if (!isset($_SESSION['username'])) {
      // L'utilisateur n'est pas connecté, rediriger vers la page de connexion
      header('Location: pageConnexion.php');
      exit();
  }

  else{
      ?>
      <form name="quizzMaison" method="post" action="QuizzMaison_post.php">
        <?php
      $query = $bdd->prepare("SELECT Questions.Libelle_Question, Questions.Id_Question FROM Questions WHERE idQuizz = 1");
      $query->execute();
      $result = $query->fetchAll();
      $_SESSION['numQuestion']=count($result);
        echo('<p class="question">'.$result[$_SESSION['index']][0]. '</p>');
        ?>
        <br>
        <?php
        $query = $bdd->prepare("SELECT Reponse.libelleReponse, Reponse.idMaison FROM Reponse WHERE idQuestion= ". $result[$_SESSION['index']][1]);
        $query->execute();
        $resultrsp = $query->fetchAll();
        $taille = count($resultrsp);
        for ($p=0; $p < $taille; $p++) { 
          echo ('<input type="radio" name="answer" value="'.$resultrsp[$p]['idMaison'].'" required> '.$resultrsp[$p]['libelleReponse'].'<br>')?><?php
        }
        // echo($_SESSION['gryff']);
        // echo($_SESSION['slyth']);
        // echo($_SESSION['pouf']);
        // echo($_SESSION['serd']);
      ?>
      <br>
      <?php
      if($_SESSION['index'] == 9){
        ?>
        <a href="Resultats.php">Valider et voir le resultat</a>
        <?php
      }
      else {
        ?>
        <input type="submit" value="Valider">
        <?php
      }
      ?>
      </form> 
</body>
</html>
<?php 
    }
?>
    <script src="JS/script2.js"></script>
