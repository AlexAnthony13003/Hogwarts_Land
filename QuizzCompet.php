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
    <title>Quizz Competition</title>
</head>
<body class="quizzCompetition">
  
    <h1>Quizz Competition</h1>
    <?php 
    session_start();
    if (!isset($_SESSION['username'])) {
      // L'utilisateur n'est pas connecté, rediriger vers la page de connexion
      header('Location: pageConnexion.php');
      exit();
  }

  else{
      ?>
      <form name="quizzCompetition" method="post" action="QuizzCompet_post.php">
        <?php
      $query = $bdd->prepare("SELECT Questions.Libelle_Question, Questions.Id_Question FROM Questions WHERE idQuizz = 4");
      $query->execute();
      $result = $query->fetchAll();
      $_SESSION['numQuestion']=count($result);
      echo $_SESSION['numQuestion'];
        echo('<p class="question">'.$result[$_SESSION['competition']][0]. '</p>');
        ?>
        <br>
        <?php
        $query = $bdd->prepare("SELECT Reponse.libelleReponse, Reponse.idPerso FROM Reponse WHERE idQuestion= ". $result[$_SESSION['competition']][1]);
        $query->execute();
        $resultrsp = $query->fetchAll();
        $taille = count($resultrsp);
        for ($p=0; $p < $taille; $p++) { 
          echo ('<input type="radio" name="answer" value="'.$resultrsp[$p]['idPatronus'].'" required> '.$resultrsp[$p]['libelleReponse'].'<br>')?><?php
        }
        echo($_SESSION['isTrue']);
      ?>
      <br>
      <?php
      if($_SESSION['competition'] == 9){
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