<?php
function connectDB(){
   $hote = 'mysql-hogwartsland.alwaysdata.net';
   $utilisateur = '288822';
   $mdp = '!7fr74Hcu4XdmMe';
   $nombdd = 'hogwartsland_bdd'; // Nom de la base de données
   $bdd = new PDO("mysql:host=$hote;dbname=$nombdd", $utilisateur, $mdp);
   return $bdd; // Retourne l'objet PDO représentant la connexion à la base de données
}
function insertSQL($table, $data){
   $bdd = connectDB();
    // Création des variables nécessaires pour la requête SQL
    $keys = array_keys($data);
    $values = array_values($data);
    $placeholders = array_fill(0, count($values), '?');

    // Préparation de la requête SQL
    $query = "INSERT INTO $table (" . implode(',', $keys) . ") VALUES (" . implode(',', $placeholders) . ")";
    $stmt = $bdd->prepare($query);

    // Exécution de la requête SQL
    $stmt->execute($values);

}
function selectSQL($table, $colonne, $condition){
   $bdd = connectDB();
   // Requête SELECT avec clause WHERE
   $sql = "SELECT * FROM $table WHERE $colonne = ?";
   $stmt = $bdd->prepare($sql);
   $stmt->execute(array($condition));

   // Récupération des résultats
   $row = $stmt->fetch(PDO::FETCH_ASSOC);
   return $row;
}
function selectSQLAll($table, $colonne, $condition = null){
   $bdd = connectDB();
   // Requête SELECT avec clause WHERE si $condition est défini
   if ($condition !== null) {
       $sql = "SELECT * FROM $table WHERE $colonne = ?";
       $stmt = $bdd->prepare($sql);
       $stmt->execute(array($condition));
   }
   // Requête SELECT sans clause WHERE si $condition est nul
   else {
       $sql = "SELECT * FROM $table";
       $stmt = $bdd->prepare($sql);
       $stmt->execute();
   }

   // Récupération des résultats
   $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
   return $row;
}
function selectSQLAllDESC($table, $orderBy){
   $bdd = connectDB();
       $sql = "SELECT * FROM $table ORDER BY $orderBy DESC";
       $stmt = $bdd->prepare($sql);
       $stmt->execute();

   // Récupération des résultats
   $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
   return $row;
}
?>
