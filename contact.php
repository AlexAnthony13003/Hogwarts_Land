<?php
include 'navbar.php'
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
    <title>Contact HL</title>
</head>
<body class="contact">
<div class="content">
    <h1>Contactez-nous</h1>
    <?php
    session_start();
    if (!isset($_SESSION['username'])) {
        // L'utilisateur n'est pas connecté, rediriger vers la page de connexion
        header('Location: pageConnexion.php');
        exit();
    }

    else{
      ?>
     <form name="contact_form" method="post" action="">
		<label for="nom">Nom *:</label>
		<input type="text" id="nom" name="nom" required><br><br>
     <label for="prenom">Prenom *:</label>
		<input type="text" id="prenom" name="prenom" required><br><br>
     <label for="email"> Mail  *:</label>
		<input type="text" id="email" name="email" size="30" required><br><br>
     <label for="telephone">Téléphone :</label>
		<input type="text" id="telephone" name="telephone"><br><br>
     <label for="sujet">Sujet *:</label>
		<input type="text" id="sujet" name="sujet" size="30" required><br><br>
     <label for="commentaire">Message *:</label><br><br>
     <textarea id="commentaire" name="commentaire" rows="6" cols="40" required></textarea><br><br></textarea>
     <div id="submit">
    <button class="submit" type="submit">
    <span class="circle" aria-hidden="true">
      <span class="icon arrow"></span>
    </span>
    <span class="button-text">Envoyer</span>
  </button>
</div>
    </form>
      </div>

<?php
if(isset($_POST['email'])) {
 
    // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = "contact.hogwartsland@gmail.com";
    $email_subject = htmlspecialchars($_POST['sujet']);
 
    function died($error) {
        // your error code can go here
        echo 
"Nous sommes désolés, mais des erreurs ont été détectées dans le" .
" formulaire que vous avez envoyé. ";
        echo "Ces erreurs apparaissent ci-dessous.<br /><br />";
        echo $error."<br /><br />";
        echo "Merci de corriger ces erreurs.<br /><br />";
        die();
    }
 
 
    // si la validation des données attendues existe
     if(!isset($_POST['nom']) ||
        !isset($_POST['prenom']) ||
        !isset($_POST['email']) ||
        !isset($_POST['sujet']) ||
        !isset($_POST['commentaire'])) {
        died(
'Nous sommes désolés, mais le formulaire que vous avez soumis semble poser' .
' problème.');
    }
 
     
 
    $nom = $_POST['nom']; // required
    $prenom = $_POST['prenom']; // required
    $email = $_POST['email']; // required
    $telephone = $_POST['telephone']; // not required
    $sujet = $_POST['sujet']; // required
    $commentaire = $_POST['commentaire']; // required
 
    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
    if(!preg_match($email_exp,$email)) {
      $error_message .= 
'L\'adresse e-mail que vous avez entrée ne semble pas être valide.<br />';
    }
   
      // Prend les caractères alphanumériques + le point et le tiret 6
      $string_exp = "/^[A-Za-z0-9 .'-]+$/";
   
    if(!preg_match($string_exp,$nom)) {
      $error_message .= 
'Le nom que vous avez entré ne semble pas être valide.<br />';
    }
   
    if(!preg_match($string_exp,$prenom)) {
      $error_message .= 
'Le prénom que vous avez entré ne semble pas être valide.<br />';
    }
    if(strlen($sujet) < 2) {
        $error_message .= 
  'Le commentaire que vous avez entré ne semble pas être valide.<br />';
      }

    if(strlen($commentaire) < 2) {
      $error_message .= 
'Le commentaire que vous avez entré ne semble pas être valide.<br />';
    }
   
    if(strlen($error_message) > 0) {
      died($error_message);
    }
 
    $email_message = "Détail :\n\n";
    $email_message .= "Nom : ".$nom."\n";
    $email_message .= "Prenom : ".$prenom."\n";
    $email_message .= "Email : ".$email."\n";
    $email_message .= "Telephone : ".$telephone."\n";
    $email_message .= "Commentaire : ".$commentaire."\n";
 
    // create email headers
    $headers = 'From: '.$email."\r\n".
    'Reply-To: '.$email."\r\n" .
    'X-Mailer: PHP/' . phpversion();
    mail($email_to, $email_subject, $email_message, $headers);
    ?>
     
    <!-- mettez ici votre propre message de succès en html -->
     
    <script>alert("<?php echo htmlspecialchars('Merci de nous avoir contacté. Nous vous contacterons très bientôt.', ENT_QUOTES); ?>")</script>

    <center></center>
     
    <?php

    }?>
  <?php
    }
  ?>
</body>
</html>