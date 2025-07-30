<!-- En utilisant php, connectez-vous à la base de données “jour09”. A l’aide d’une requête
SQL, sélectionnez le prénom, le nom et la date de naissance des étudiants qui sont nés
entre 1998 et 2018. Affichez le résultat de cette requête dans un tableau html. La
première ligne de votre tableau html doit contenir le nom des champs. Les suivantes
doivent contenir les données présentes dans votre base de données. -->

<?php

// Connexion à la base de données avec l'objet mysqli (serveur, utilisateur, mot de passe, nom de la base)
$mysqli = new mysqli("localhost", "root", "root", "jour09");
// Requête SQL pour sélectionner le prénom, le nom et la date de naissance des étudiants qui sont nés entre 1998 et 2018.
$sql = "SELECT * FROM etudiants WHERE naissance BETWEEN '1998-01-01' AND '2018-12-31'";
// Exécution de la requête et stockage du résultat dans $result
$result = $mysqli->query($sql);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des étudiants</title>
    <style>
        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 6px;
        }
    </style>
</head>

<body>
    <table>
        <thead>
            <tr>
                <th>Prénom</th>
                <th>Nom</th>
                <th>Date de naissance</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Parcours du résultat de la requête ligne par ligne avec fetch_assoc()
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['prenom']) . "</td>";
                echo "<td>" . htmlspecialchars($row['nom']) . "</td>";
                echo "<td>" . htmlspecialchars($row['naissance']) . "</td>";
                echo "</tr>";
            }
            $mysqli->close();
            ?>
        </tbody>
    </table>
</body>

</html>