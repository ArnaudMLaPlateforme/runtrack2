<?php
session_start();

// Connexion à la base de données
require_once 'db.php';

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
    <link rel="stylesheet" href="style.css" />
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-papb+59D4a9pe6ylu6lhkT6TH+X6LTXdR5DkvfMivAX3b8IH3dQAYTtuGynUayjz1F60vGBrC7C2xY9K5PZyMw=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Urbanist:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>

<body>
    <?php include('header.php'); ?>

    <main>
        <section class="hero">
            <div class="hero-content">
                <h2>LIVRE D'OR</h2>
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
                    echo '<a href="commentaire.php" class="btn-cta">Je laisse un commentaire</a>';
                } else {
                    echo '<p class="info-message">Vous devez être <a href="connexion.php">connecté</a> pour laisser un commentaire.</p>';
                }

                ?>

            </div>
        </section>
    </main>



</body>

</html>

<?php
$mysqli->close();
?>