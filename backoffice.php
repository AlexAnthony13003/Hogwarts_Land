<?php 
   include 'commands/SQL.php';
   include 'navbar.php';
   $bdd = connectDB();
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
    <link rel="stylesheet" href="css/mainVeritable.css">
    <link rel="icon" type="image/webp" href="/IMG/favicon.webp"/>
    <script src="JS/script.js"></script>
    <title>Backoffice HL</title>
</head>
<body class="quizz">
<div class="contenu">
  <?php
session_start();
if ($_SESSION['isAdmin'] == 0) {
  // L'utilisateur n'est pas connecté, rediriger vers la page de connexion
  header('Location: pageConnexion.php');
  exit();
}

else{
  ?>
        <center><h1>Bienvenue sur le pannel d'administration</h1></center>
        <div class="menuback">
        <button class="tablink" onclick="openTab('tab1')">Utilisateurs</button>  
          <button class="tablink" onclick="openTab('tab2')">Quizz</button>
        </div>

        <div id="tab1" class="tabcontent">
          <h2>Utilisateurs</h2>
          <p>Liste des utilisateurs sur la plateforme.</p>
          <?php
               $count = selectSQLAll("Utilisateurs", "");
          ?>
          <div>
          <table class="tablescroll">
          <thead>
            <tr>
              <th>Pseudo</th>
              <th>Prenom</th>
              <th>Nom</th>
              <th>Date_Naiss</th>
              <th>Adresse mail</th>
              <th>Maison</th>
              <th>Administrateur</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($count as $row): ?>
            <tr>
              <td><?= $row['Username'] ?></td>
              <td><?= $row['Prenom'] ?></td>
              <td><?= $row['Nom'] ?></td>
              <td><?= $row['Date_Naiss'] ?></td>
              <td><?= $row['Adresse_Mail'] ?></td>
              <td><?= $row['Maison'] ?></td>
              <td><?php if($row['Admin'] == 1){
                echo "Oui";
              }
              else {
                echo "Non";
              }  ?></td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
        </div>
        </div>
        <div id="tab2" class="tabcontent">
          <h2>Logs de quizz</h2>
          <p>Voici le tableau des logs de la réalisation des quizz.</p>
          <?php
  $query = $bdd->prepare("SELECT Utilisateurs.Username, Utilisateurs.Prenom, Quizz.Id_Quizz, Quizz.Libelle_Quizz, 
  Maison.libelleMaison, Patronus.libellePatronus, Personnage.libellePerso, Utilisateurs.Score, Participer.Date_Heure FROM 
  `Participer` INNER JOIN Utilisateurs ON Participer.Id_User = Utilisateurs.Id_User INNER JOIN Quizz ON 
  Participer.Id_Quizz = Quizz.Id_Quizz INNER JOIN Maison ON Utilisateurs.idMaison = Maison.idMaison INNER JOIN 
  Patronus ON Utilisateurs.idPatronus = Patronus.idPatronus INNER JOIN Personnage ON Utilisateurs.IdPerso = 
  Personnage.IdPerso;");
  $query->execute();
  $count2 = $query->fetchAll();
?>
  <table class="tablescroll">
    <thead>
      <tr>
        <th>Pseudo</th>
        <th>Prenom</th>
        <th>Libelle du quiz</th>
        <th>Resultat du quiz</th>
        <th>Date/Heure</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($count2 as $row): ?>
      <tr>
        <td><?= $row['Username'] ?></td>
        <td><?= $row['Prenom'] ?></td>
        <td><?= $row['Libelle_Quizz'] ?></td>
        <td><?php if ($row['Id_Quizz'] == 1) {
          echo ($row['libelleMaison']);
        }
        elseif($row['Id_Quizz'] == 2){
          echo ($row['libellePerso']);
        }
        elseif($row['Id_Quizz'] == 3){
          echo ($row['libellePatronus']);
        }
        elseif($row['Id_Quizz'] == 4){
          echo ($row['Score']/30*100 . '%');
        }
        ?></td>
        <td><?= $row['Date_Heure'] ?></td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
  </div>
<?php
}
?>
</body>
</html>