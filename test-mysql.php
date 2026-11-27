<?php
$thm = $_GET['thm'] ?? 1;
$nb = intval($_GET['nb'] ?? 10);
// Coalescence nulle ??

// $cnx = new mysqli('db', 'teetim', 'teetim', 'teetim');

// $sql = "SELECT theme.nom, SUM(ventes) AS ventes_totales
//         FROM produit
//             JOIN theme ON thm_id = theme.id
//                 WHERE cat_id=1
//                 GROUP BY thm_id
//                 ORDER BY ventes_totales DESC";

// Étape 1: connection a la BD MySQL avec le librairie PDO)
// mINI ÉTAPE 0: DÉFINIR LE DSN (dATA Source Name)
$dsn = "mysql:host=db;dbname=teetim;charset=utf8mb4"; // chaine specfique A mysql
$cnx = new PDO($dsn, 'teetim', 'teetim', [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_SILENT,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
]); 
// Étape 2: écrire et préparer une requete ****parametree**** SQL
$sql = "SELECT nom, prix, ventes FROM produit WHERE thm_id=? LIMIT $nb"; 
$reqParametree = $cnx->prepare($sql);

$resultat = $reqParametree->execute([$thm]);
$enregistrements = $reqParametree->fetchAll(PDO::FETCH_OBJ);

// print_r($enregistrements);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test intégration PHP/MySQL</title>
</head>
<body>
    <h2><?= $nb; ?> PRODUITS PAR THEME <?= $thm; ?></h2>
    
        <?php foreach($enregistrements as $ligne ) : ?>
            <div>
                <span><?= $ligne->nom; ?></span>
                <span><?= $ligne->prix; ?></span>
                <span><?= $ligne->ventes; ?></span>
            </div>
        <?php endforeach; ?>
    
</body>
</html>