<?php
   include 'commands/SQL.php';
   $bdd = connectDB();
session_start();
if(isset($_POST['username']) && isset($_POST['password']))
{
   // Échapper les entrées utilisateur
   $username = htmlspecialchars($_POST['username']);
   $password = $_POST['password'];

   // Hasher le mot de passe
   $salt = "Ls28pE66";
   $hashedPassword = hash('sha512', hash('sha512', $salt) . $password);

   // Préparer la requête SQL avec des paramètres liés
   $query = $bdd->prepare("SELECT Id_User, Admin FROM Utilisateurs WHERE Username = :username AND Password = :password");
   $query->bindParam(":username", $username);
   $query->bindParam(":password", $hashedPassword);
   $query->execute();
   $user = $query->fetch();
   
if ($user) {
  $_SESSION['isAdmin'] = $user['Admin'];
  $_SESSION['username'] = $username;
  $_SESSION['Compteur'] = 0;
//   $_SESSION['index'] = 0;
//   $_SESSION['indexperso'] = 0;
  $_SESSION['id'] = $user['Id_User'];

  header('Location: main.php');
  exit();

   } else {
      // Les identifiants sont incorrects
      header('Location: pageConnexion.php?erreur=1');
      exit();
   }
} else {
   header('Location: pageConnexion.php');
   exit();
}