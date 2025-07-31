<?php
session_start();

// Connexion à la base de données
$mysqli = new mysqli("localhost", "root", "root", "livreor");

if ($mysqli->connect_error) {
    die("Erreur de connexion : " . $mysqli->connect_error);
}

// Requête pour récupérer les commentaires avec les infos utilisateur
$sql = "SELECT commentaires.commentaire, commentaires.date, utilisateurs.login
        FROM commentaires
        JOIN utilisateurs ON commentaires.id_utilisateur = utilisateurs.id
        ORDER BY commentaires.date DESC";

$result = $mysqli->query($sql);

if (!$result) {
    die("Erreur lors de la récupération des commentaires : " . $mysqli->error);
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <title>Livre d’or</title>
</head>
<body>
    <h1>Livre d’or</h1>

    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            // Formater la date en jour/mois/année
            $date = date("d/m/Y", strtotime($row['date']));
            echo "<p><strong>Posté le {$date} par {$row['login']} :</strong></p>";
            echo "<p>" . nl2br(htmlspecialchars($row['commentaire'])) . "</p>";
            echo "<hr>";
        }
    } else {
        echo "<p>Aucun commentaire pour le moment.</p>";
    }

    // Si utilisateur connecté, afficher lien vers ajout de commentaire
    if (isset($_SESSION['user_id'])) {
        echo '<p><a href="commentaire.php">Ajouter un commentaire</a></p>';
    }
    ?>

</body>
</html>

<?php
$mysqli->close();
?>
