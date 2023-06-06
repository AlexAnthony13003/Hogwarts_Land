<?php
include 'navbar.php';
include 'commands/SQL.php';
$bdd = connectDB();
session_start();
if (!isset($_SESSION['username'])) {
    // L'utilisateur n'est pas connecté, rediriger vers la page de connexion
    header('Location: pageConnexion.php');
    exit();
} else {
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
        <link rel="stylesheet" href="css/mainVeritable.css">
        <link rel="icon" type="image/webp" href="/IMG/favicon.webp" />
        <script src="JS/script.js"></script>
        <title>Profil</title>
    </head>

    <body>
        <div class="quizz">
            <div class="contenu">
                <h1>Mon profil</h1>
                <h2><?php echo $_SESSION['username']; ?></h2>
                <div class="profil">
                    <h3>Maison : <?php
                                    // Récupération de l'id de la maison de l'utilisateur connecté
                                    $resultat = selectSQL('Utilisateurs', 'Id_User', $_SESSION['id']);
                                    $idMaison = $resultat['idMaison'];

                                    // Récupération du nom de la maison correspondante
                                    $maison = selectSQL('Maison', 'idMaison', $idMaison);
                                    echo $maison['libelleMaison'];
                                    ?><br><br>
                        <img src="<?php echo $maison['img'] ?>" alt="Maison_Utilisateur">
                    </h3>
                    <h3>Personnage : <?php
                                        // Récupération de l'id de la maison de l'utilisateur connecté
                                        $resultat = selectSQL('Utilisateurs', 'Id_User', $_SESSION['id']);
                                        $idPerso = $resultat['IdPerso'];

                                        // Récupération du nom de la maison correspondante
                                        $perso = selectSQL('Personnage', 'idPerso', $idPerso);
                                        echo $perso['libellePerso'];
                                        ?><br><br>
                        <img src="<?php echo $perso['img'] ?>" alt="Personnage_Utilisateur">
                    </h3>
                    <h3>Patronus : <?php
                                    // Récupération de l'id de la maison de l'utilisateur connecté
                                    $resultat = selectSQL('Utilisateurs', 'Id_User', $_SESSION['id']);
                                    $idPatronus = $resultat['idPatronus'];

                                    // Récupération du nom de la maison correspondante
                                    $patronus = selectSQL('Patronus', 'idPatronus', $idPatronus);
                                    echo $patronus['libellePatronus'];
                                    ?><br><br>
                        <img src="<?php echo $patronus['img'] ?>" alt="Patronus_Utilisateur">
                    </h3>
                </div>
                <h3 class="resultat_profil">Résultat Compétition :
                    <?php
                    $resultat = selectSQL('Utilisateurs', 'Id_User', $_SESSION['id']);
                    $score = $resultat['Score'];
                    echo $score . "/12 => " . round($score / 11 * 100) . " %" ?></h3>

            </div>
        </div>
    </body>
<?php
}
?>

    </html>