<!-- En utilisant php, connectez-vous à la base de données “jour09”. A l’aide d’une requête
SQL, sélectionnez récupérer le nom des salles et le nom de leur étage. Affichez le
résultat de cette requête dans un tableau html. La première ligne de votre tableau html
doit contenir le nom des champs. Les suivantes doivent contenir les données présentes
dans votre base de données. -->

<?php

// Connexion à la base de données avec l'objet mysqli (serveur, utilisateur, mot de passe, nom de la base)
$mysqli = new mysqli("localhost", "root", "root", "jour09");
// Requête SQL pour récupérer le nom des salles et le nom de leur étage
$sql = "SELECT salles.nom AS nom_salle, etage.nom AS nom_etage FROM salles JOIN etage ON salles.id_etage = etage.id";
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
                <th>Salle</th>
                <th>Etage</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Parcours du résultat de la requête ligne par ligne avec fetch_assoc()
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['nom_salle']) . "</td>";
                echo "<td>" . htmlspecialchars($row['nom_etage']) . "</td>";
                echo "</tr>";
            }
            $mysqli->close();
            ?>
        </tbody>
    </table>
</body>

</html>