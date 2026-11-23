<?php

$cnx = new mysqli('db', 'teetim', 'teetim', 'teetim');

$sql = "SELECT theme.nom, SUM(ventes) AS ventes_totales
        FROM produit
            JOIN theme ON thm_id = theme.id
                WHERE cat_id=1
                GROUP BY thm_id
                ORDER BY ventes_totales DESC";

$resultat = $cnx->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test intégration PHP/MySQL</title>
</head>
<body>
    <h2>Ventes totales par nom de thème</h2>
    <ul>
        <?php while($ligne = $resultat->fetch_assoc()):;  ?>
            <li><?= $ligne['nom']; ?> : <?= $ligne['ventes_totales']; ?></li>
        <?php endwhile;  ?>
    </ul>
</body>
</html>