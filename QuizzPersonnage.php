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
  <link rel="icon" type="image/webp" href="/IMG/favicon.webp" />
  <link rel="stylesheet" href="css/quizz.css">
  <script src="JS/animation.js"></script>
  <title>Quizz Personnage</title>
</head>

<body class="quizzPerso">

  <h1>Quiz Personnage</h1>
  <?php
  session_start();
  if (!isset($_SESSION['username'])) {
    // L'utilisateur n'est pas connecté, rediriger vers la page de connexion
    header('Location: pageConnexion.php');
    exit();
  } else {
  ?>
    <form name="quizzPerso" method="post" action="QuizzPerso_post.php">
      <?php
      $query = $bdd->prepare("SELECT Questions.Libelle_Question, Questions.Id_Question FROM Questions WHERE idQuizz = 2");
      $query->execute();
      $result = $query->fetchAll();
      $_SESSION['numQuestion'] = count($result);
      echo $_SESSION['numQuestion'] . " Questions";

      echo ('<p class="question">' . $result[$_SESSION['indexperso']][0] . '</p>');
      ?>
      <br>
      <?php
      $query = $bdd->prepare("SELECT Reponse.libelleReponse, Reponse.idPerso FROM Reponse WHERE idQuestion= " . $result[$_SESSION['indexperso']][1]);
      $query->execute();
      $resultrsp = $query->fetchAll();
      $taille = count($resultrsp);
      for ($p = 0; $p < $taille; $p++) {
        echo ('<input type="radio" name="answer" value="' . $resultrsp[$p]['idPerso'] . '" required> ' . $resultrsp[$p]['libelleReponse'] . '<br>') ?><?php
                                                                                                                                                    }
                                                                                                                                                    // echo($_SESSION['harry']);
                                                                                                                                                    // echo($_SESSION['ron']);
                                                                                                                                                    // echo($_SESSION['hermione']);
                                                                                                                                                    // echo($_SESSION['neuville']);
                                                                                                                                                    // echo($_SESSION['voldi']);
                                                                                                                                                    // echo($_SESSION['drago']);
                                                                                                                                                    // echo($_SESSION['dumbi']);
                                                                                                                                                    // echo($_SESSION['rog']);
                                                                                                                                                    // echo($_SESSION['luna']);
                                                                                                                                                    // echo($_SESSION['gin']);

                                                                                                                                                      ?>
      <br>
      <?php
      if ($_SESSION['indexperso'] == 19) {
      ?>
        <a href="Resultats.php">Valider et voir le resultat</a>
      <?php
      } else {
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