<?php
    include 'navbar.php';
    include 'commands/SQL.php';
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
    <link rel="icon" type="image/webp" href="/IMG/favicon.webp"/>
    <link rel="stylesheet" href="css/mainVeritable.css">
    <script src="JS/script.js"></script>
    <title>Classement HL</title>
</head>
<body class='contact'>
    <div class='content'>
    
        <?php
    session_start();
    if (!isset($_SESSION['username'])) {
      // L'utilisateur n'est pas connecté, rediriger vers la page de connexion
      header('Location: pageConnexion.php');
      exit();
    }
    else{
        $user = selectSQLAllDESC("Utilisateurs", "Score");
        $cpt = 1;
        ?>
        <h1> Classement Général :</h1>
        <table class="tablescroll">
        <thead>
          <tr>
            <th>Classement</th>
            <th>Pseudo</th>
            <th>Prenom</th>
            <th>Score</th>
            <th>Administrateur</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($user as $row): ?>
          <tr>
            <td><?php echo $cpt ?></td>
            <td><?= $row['Username'] ?></td>
            <td><?= $row['Prenom'] ?></td>
            <td><?= ($row['Score']*5). " %" ?></td>
            <td><?php if($row['Admin'] == 1){
              echo "Oui";
            }
            else {
              echo "Non";
            }  ?></td>
          </tr>
          <?php
          $cpt ++;
         endforeach; 
         ?>
        </tbody>
      </table>
      <?php
}
?>