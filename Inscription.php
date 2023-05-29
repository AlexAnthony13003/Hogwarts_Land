<?php
   include 'commands/SQL.php';
   $bdd = connectDB();

// Vérification des champs du formulaire
if (!empty($_POST['mail']) && !empty($_POST['password'])) {
    $prenom = htmlspecialchars($_POST['prenom']);
    $nom = htmlspecialchars($_POST['nom']);
    $dateNaiss = htmlspecialchars($_POST['dateNaiss']);
    $mail = htmlspecialchars($_POST['mail']);
    $username = htmlspecialchars($_POST['username']);
    // Hashage du mot de passe
    $salt = "Ls28pE66";
    $hashedPassword = hash('sha512', hash('sha512', $salt) . $_POST['password']);
    $patronus=5;
    $maison = 5;
    $personnage = 11;
    $score = 0;
    
    // Vérification de l'adresse mail
    if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
        echo "L'adresse e-mail est invalide";
        header("Location: PageInscription.php");
    } else {
        // Insertion de données dans une table
        $table = "Utilisateurs";
        $data = array(
            "Prenom" => $prenom,
            "Nom" => $nom,
            "Date_Naiss" => $dateNaiss,
            "Adresse_Mail" => $mail,
            "Username" => $username,
            "Password" => $hashedPassword,
            "idMaison" => $maison,
            "IdPerso" => $personnage,
            "idPatronus" => $patronus,
            "Score" => $score,
            "Admin" => 0
        );
        insertSQL($table, $data);
        header("Location: pageConnexion.php");
        echo("Utilisateur créé");
    }
} else {
    header("Location: PageInscription.php");
    echo "Erreur lors de la saisie des champs !";
}