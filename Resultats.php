<?php
include 'navbar.php';
include 'commands/SQL.php';
$bdd = connectDB();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/velocity/1.2.3/velocity.min.js">
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/velocity/1.2.3/velocity.ui.min.js">
  </script>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/webp" href="/IMG/favicon.webp" />
  <link rel="stylesheet" href="css/mainVeritable.css">
  <script src="JS/script.js"></script>
  <title>Résultats HL</title>
</head>

<body class='contact'>
  <div class='content'>

    <?php
    session_start();
    if (!isset($_SESSION['username'])) {
      // L'utilisateur n'est pas connecté, rediriger vers la page de connexion
      header('Location: pageConnexion.php');
      exit();
    } else {
      if (($_SESSION['gryff'] || $_SESSION['slyth'] || $_SESSION['serd'] || $_SESSION['pouf']) != 0) {
    ?><h2><?php echo ($_SESSION['username']) ?>, Bienvenue dans ta maison</h2><br><br>
        <?php
        $table = "Participer";
        $data = array(
          "Id_User" => $_SESSION['id'],
          "Id_Quizz" => 1
        );
        insertSQL($table, $data);
        if ($_SESSION['gryff'] >= $_SESSION['slyth'] && $_SESSION['gryff'] >= $_SESSION['serd'] && $_SESSION['gryff'] >= $_SESSION['pouf']) {
          $maisonUser = 1;
        } else if ($_SESSION['slyth'] >= $_SESSION['gryff'] && $_SESSION['slyth'] >= $_SESSION['serd'] && $_SESSION['slyth'] >= $_SESSION['pouf']) {
          $maisonUser = 2;
        } else if ($_SESSION['pouf'] >= $_SESSION['gryff'] && $_SESSION['pouf'] >= $_SESSION['slyth'] && $_SESSION['pouf'] >= $_SESSION['serd']) {
          $maisonUser = 3;
        } else if ($_SESSION['serd'] >= $_SESSION['gryff'] && $_SESSION['serd'] >= $_SESSION['pouf'] && $_SESSION['serd'] >= $_SESSION['slyth']) {
          $maisonUser = 4;
        }
        $query = $bdd->prepare("UPDATE Utilisateurs SET idMaison= $maisonUser WHERE Utilisateurs.Username= :username");
        $query->bindParam(':username', $_SESSION['username']);
        $query->execute();
        $user = selectSQLAll("Utilisateurs", "idMaison", $maisonUser);
        $maison = $user['idMaison'];
        echo $maison;
        $select = selectSQL("Maison", "idMaison", $maisonUser);
        ?>
        <img src="<?php echo $select['img']; ?>" alt="maison">
        <h2><?php echo $select['libelleMaison']; ?></h2>
      <?php
      } elseif (($_SESSION['cerf'] || $_SESSION['loutre'] || $_SESSION['chien'] || $_SESSION['biche']) != 0) {
      ?><h2><?php echo ($_SESSION['username']) ?>, Découvres ton Patronus</h2><br><br>
        <?php
        $table = "Participer";
        $data = array(
          "Id_User" => $_SESSION['id'],
          "Id_Quizz" => 3
        );
        insertSQL($table, $data);
        if ($_SESSION['cerf'] >= $_SESSION['biche'] && $_SESSION['cerf'] >= $_SESSION['chien'] && $_SESSION['cerf'] >= $_SESSION['loutre']) {
          $patronusUser = 1;
        } else if ($_SESSION['biche'] >= $_SESSION['cerf'] && $_SESSION['biche'] >= $_SESSION['chien'] && $_SESSION['biche'] >= $_SESSION['loutre']) {
          $patronusUser = 2;
        } else if ($_SESSION['loutre'] >= $_SESSION['cerf'] && $_SESSION['loutre'] >= $_SESSION['biche'] && $_SESSION['loutre'] >= $_SESSION['chien']) {
          $patronusUser = 3;
        } else if ($_SESSION['chien'] >= $_SESSION['chien'] && $_SESSION['chien'] >= $_SESSION['loutre'] && $_SESSION['chien'] >= $_SESSION['biche']) {
          $patronusUser = 4;
        }
        $query = $bdd->prepare("UPDATE Utilisateurs SET idPatronus= $patronusUser WHERE Utilisateurs.Username= :username");
        $query->bindParam(':username', $_SESSION['username']);
        $query->execute();
        $user = selectSQLAll("Utilisateurs", "idPatronus", $patronusUser);
        $patronus = $user['idPatronus'];
        $select = selectSQL("Patronus", "idPatronus", $patronusUser);
        ?>
        <img src="<?php echo $select['img']; ?>" alt="patronus">
        <h2><?php echo $select['libellePatronus']; ?></h2>
      <?php
      } elseif (($_SESSION['harry'] || $_SESSION['ron'] || $_SESSION['hermione'] || $_SESSION['neuville'] || $_SESSION['voldi'] || $_SESSION['drago'] || $_SESSION['dumbi'] || $_SESSION['rog'] || $_SESSION['luna'] || $_SESSION['gin']) != 0) {
      ?><h2><?php echo ($_SESSION['username']) ?>, Si tu étais un personnage tu serais</h2><br><br>
        <?php
        $table = "Participer";
        $data = array(
          "Id_User" => $_SESSION['id'],
          "Id_Quizz" => 2,
        );
        insertSQL($table, $data);
        if (
          $_SESSION['harry'] >= $_SESSION['ron'] && $_SESSION['harry'] >= $_SESSION['hermione'] && $_SESSION['harry'] >= $_SESSION['neuville'] && $_SESSION['harry'] >= $_SESSION['voldi']
          && $_SESSION['harry'] >= $_SESSION['drago'] && $_SESSION['harry'] >= $_SESSION['dumbi'] && $_SESSION['harry'] >= $_SESSION['rog'] && $_SESSION['harry'] >= $_SESSION['luna'] && $_SESSION['harry'] >= $_SESSION['gin']
        ) {
          $persoUser = 1;
        } elseif (
          $_SESSION['ron'] >= $_SESSION['harry'] && $_SESSION['ron'] >= $_SESSION['hermione'] && $_SESSION['ron'] >= $_SESSION['neuville'] && $_SESSION['ron'] >= $_SESSION['voldi']
          && $_SESSION['ron'] >= $_SESSION['drago'] && $_SESSION['ron'] >= $_SESSION['dumbi'] && $_SESSION['ron'] >= $_SESSION['rog'] && $_SESSION['ron'] >= $_SESSION['luna'] && $_SESSION['ron'] >= $_SESSION['gin']
        ) {
          $persoUser = 2;
        } elseif (
          $_SESSION['hermione'] >= $_SESSION['ron'] && $_SESSION['hermione'] >= $_SESSION['harry'] && $_SESSION['hermione'] >= $_SESSION['neuville'] && $_SESSION['hermione'] >= $_SESSION['voldi']
          && $_SESSION['hermione'] >= $_SESSION['drago'] && $_SESSION['hermione'] >= $_SESSION['dumbi'] && $_SESSION['hermione'] >= $_SESSION['rog'] && $_SESSION['hermione'] >= $_SESSION['luna'] && $_SESSION['harry'] >= $_SESSION['gin']
        ) {
          $persoUser = 3;
        } elseif (
          $_SESSION['neuville'] >= $_SESSION['ron'] && $_SESSION['neuville'] >= $_SESSION['hermione'] && $_SESSION['neuville'] >= $_SESSION['harry'] && $_SESSION['neuville'] >= $_SESSION['voldi']
          && $_SESSION['neuville'] >= $_SESSION['drago'] && $_SESSION['neuville'] >= $_SESSION['dumbi'] && $_SESSION['neuville'] >= $_SESSION['rog'] && $_SESSION['neuville'] >= $_SESSION['luna'] && $_SESSION['harry'] >= $_SESSION['gin']
        ) {
          $persoUser = 4;
        } elseif (
          $_SESSION['voldi'] >= $_SESSION['ron'] && $_SESSION['voldi'] >= $_SESSION['hermione'] && $_SESSION['voldi'] >= $_SESSION['neuville'] && $_SESSION['voldi'] >= $_SESSION['harry']
          && $_SESSION['voldi'] >= $_SESSION['drago'] && $_SESSION['voldi'] >= $_SESSION['dumbi'] && $_SESSION['voldi'] >= $_SESSION['rog'] && $_SESSION['voldi'] >= $_SESSION['luna'] && $_SESSION['voldi'] >= $_SESSION['gin']
        ) {
          $persoUser = 5;
        } elseif (
          $_SESSION['drago'] >= $_SESSION['ron'] && $_SESSION['drago'] >= $_SESSION['hermione'] && $_SESSION['drago'] >= $_SESSION['neuville'] && $_SESSION['drago'] >= $_SESSION['voldi']
          && $_SESSION['drago'] >= $_SESSION['harry'] && $_SESSION['drago'] >= $_SESSION['dumbi'] && $_SESSION['drago'] >= $_SESSION['rog'] && $_SESSION['drago'] >= $_SESSION['luna'] && $_SESSION['drago'] >= $_SESSION['gin']
        ) {
          $persoUser = 6;
        } elseif (
          $_SESSION['dumbi'] >= $_SESSION['ron'] && $_SESSION['dumbi'] >= $_SESSION['hermione'] && $_SESSION['dumbi'] >= $_SESSION['neuville'] && $_SESSION['dumbi'] >= $_SESSION['voldi']
          && $_SESSION['dumbi'] >= $_SESSION['drago'] && $_SESSION['dumbi'] >= $_SESSION['harry'] && $_SESSION['dumbi'] >= $_SESSION['rog'] && $_SESSION['dumbi'] >= $_SESSION['luna'] && $_SESSION['dumbi'] >= $_SESSION['gin']
        ) {
          $persoUser = 7;
        } elseif (
          $_SESSION['rog'] >= $_SESSION['ron'] && $_SESSION['rog'] >= $_SESSION['hermione'] && $_SESSION['rog'] >= $_SESSION['neuville'] && $_SESSION['rog'] >= $_SESSION['voldi']
          && $_SESSION['rog'] >= $_SESSION['drago'] && $_SESSION['rog'] >= $_SESSION['dumbi'] && $_SESSION['rog'] >= $_SESSION['harry'] && $_SESSION['rog'] >= $_SESSION['luna'] && $_SESSION['rog'] >= $_SESSION['gin']
        ) {
          $persoUser = 8;
        } elseif (
          $_SESSION['luna'] >= $_SESSION['ron'] && $_SESSION['luna'] >= $_SESSION['hermione'] && $_SESSION['luna'] >= $_SESSION['neuville'] && $_SESSION['luna'] >= $_SESSION['voldi']
          && $_SESSION['luna'] >= $_SESSION['drago'] && $_SESSION['luna'] >= $_SESSION['dumbi'] && $_SESSION['luna'] >= $_SESSION['rog'] && $_SESSION['luna'] >= $_SESSION['harry'] && $_SESSION['luna'] >= $_SESSION['gin']
        ) {
          $persoUser = 9;
        } elseif (
          $_SESSION['gin'] >= $_SESSION['ron'] && $_SESSION['gin'] >= $_SESSION['hermione'] && $_SESSION['gin'] >= $_SESSION['neuville'] && $_SESSION['gin'] >= $_SESSION['voldi']
          && $_SESSION['gin'] >= $_SESSION['drago'] && $_SESSION['gin'] >= $_SESSION['dumbi'] && $_SESSION['gin'] >= $_SESSION['rog'] && $_SESSION['gin'] >= $_SESSION['luna'] && $_SESSION['gin'] >= $_SESSION['harry']
        ) {
          $persoUser = 10;
        }

        $query = $bdd->prepare("UPDATE Utilisateurs SET idPerso= $persoUser WHERE Utilisateurs.Username= :username");
        $query->bindParam(':username', $_SESSION['username']);
        $query->execute();
        $user = selectSQLAll("Utilisateurs", "idPerso", $persoUser);
        $perso = $user['idPerso'];
        $select = selectSQL("Personnage", "idPerso", $persoUser);
        ?>
        <img src="<?php echo $select['img']; ?>" alt="perso">
        <h2><?php echo $select['libellePerso']; ?></h2>
      <?php
      } else {
      ?><h2><?php echo ($_SESSION['username']) ?>, Voici ton taux de réussite :</h2><br><br>
        <?php
        $table = "Participer";
        $data = array(
          "Id_User" => $_SESSION['id'],
          "Id_Quizz" => 4,
        );
        insertSQL($table, $data);
        $scoreUser = $_SESSION['isTrue'];
        ?>
        <h3> <?php echo ($scoreUser . "/12") ?></h3>
        <?php $scoresurCent = round($scoreUser / 11 * 100) ?>
        <h2> => <?php echo $scoresurCent ?> %</h2>
        <?php
        $query = $bdd->prepare("UPDATE Utilisateurs SET Score= $scoreUser WHERE Utilisateurs.Username= :username");
        $query->bindParam(':username', $_SESSION['username']);
        $query->execute();
        $user = selectSQLAllDESC("Utilisateurs", "Score");
        $cpt = 1;
        ?>
        <h3> Voici ton classement :</h3>
        <center>
          <table>
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
              <?php foreach ($user as $row) : ?>
                <tr>
                  <td><?php echo $cpt ?></td>
                  <td><?= $row['Username'] ?></td>
                  <td><?= $row['Prenom'] ?></td>
                  <td><?= round(($row['Score'] / 11 * 100)) . " %" ?></td>
                  <td><?php if ($row['Admin'] == 1) {
                        echo "Oui";
                      } else {
                        echo "Non";
                      }  ?></td>
                </tr>
              <?php
                $cpt++;
              endforeach; ?>
            </tbody>
          </table>
        </center>
    <?php
      }
    }
    ?>
</body>

</html>