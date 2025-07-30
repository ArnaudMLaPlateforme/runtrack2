<!-- En utilisant php, connectez-vous à la base de données “jour09”. A l’aide d’une requête
SQL, récupérez le nombre total d’étudiants dans une colonne nommée “nb_etudiants”.
Affichez le résultat de cette requête dans un tableau html. La première ligne de votre
tableau html doit contenir le nom du champ. -->

<?php

// Connexion à la base de données avec l'objet mysqli (serveur, utilisateur, mot de passe, nom de la base)
$mysqli = new mysqli("localhost", "root", "root", "jour09");
// Requête SQL pour récupérer toutes les données de la table "etudiants"
$sql = "SELECT COUNT(*) AS nombre_etudiants FROM etudiants ";
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
                <th>Nombre d'étudiants</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Parcours du résultat de la requête ligne par ligne avec fetch_assoc()
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['nombre_etudiants']) . "</td>";
                echo "</tr>";
            }
            $mysqli->close();
            ?>
        </tbody>
    </table>
</body>

</html>