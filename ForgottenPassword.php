<?php
include 'commands/SQL.php';
session_start();

function generateRandomPassword() {
    // Génère un mot de passe aléatoire de 16 caractères
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    $password = "";
    for($i = 0; $i < 16; $i++) {
        $index = rand(0, strlen($chars) - 1);
        $password .= substr($chars, $index, 1);
    }
    return $password;
}

if(isset($_POST['email'])) {
    $email = htmlspecialchars($_POST['email']);
    
    $bdd = connectDB();
    $user = selectSQL('Utilisateurs', 'Adresse_Mail', $email);    
    if($user) {
        //Générer un nouveau mot de passe aléatoire et le hacher
        $new_password = generateRandomPassword();
        $salt = "Ls28pE66";
        $hashedPassword = hash('sha512', hash('sha512', $salt) . $new_password);
        
        //Enregistrer le nouveau mot de passe dans la base de données
        $stmt = $bdd->prepare("UPDATE Utilisateurs SET Password = ? WHERE Adresse_Mail = ?");
        $stmt->execute([$hashedPassword, $email]);
        
        //Envoyer le nouveau mot de passe par e-mail
        $subject = "Nouveau mot de passe pour votre compte";
        $message = "Bonjour " . $user['Prenom'] . ",\n\nVotre nouveau mot de passe est : " . $new_password . "\n\nVeuillez le changer dès que possible en vous connectant à votre compte.\n\nCordialement,\nL'équipe de HogwartsLand.";
        $headers = "From: HogwartsLand";
        mail($email, $subject, $message, $headers);
        
        echo "Un nouveau mot de passe vous a été envoyé par e-mail.";
        if ($user) {
            $_SESSION['password_reset_result'] = 'success';
          } else {
            $_SESSION['password_reset_result'] = 'error';
          }
          
        
        // Inclusion du code HTML de la popup
        include 'PageForgottenPassword.html';
        header("Location: PageForgottenPassword.php");
    } else {
        echo "Cette adresse e-mail ne correspond à aucun compte.";
    }
}

?>
