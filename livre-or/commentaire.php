<?php
session_start();

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    header("Location: connexion.php");
    exit();
}

$erreur = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST['commentaire'])) {
        $commentaire = trim($_POST['commentaire']);

        // Connexion à la base de données
        $mysqli = new mysqli("localhost", "root", "root", "livreor");
        if ($mysqli->connect_error) {
            die("Erreur de connexion : " . $mysqli->connect_error);
        }

        // Préparer la requête d'insertion
        $stmt = $mysqli->prepare("INSERT INTO commentaires (commentaire, id_utilisateur, date) VALUES (?, ?, NOW())");
        $stmt->bind_param("si", $commentaire, $_SESSION['user_id']);

        if ($stmt->execute()) {
            // Redirection vers le livre d'or
            header("Location: livre-or.php");
            exit();
        } else {
            $erreur = "Erreur lors de l'ajout du commentaire.";
        }

        $stmt->close();
        $mysqli->close();
    } else {
        $erreur = "Veuillez écrire un commentaire.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <title>Ajouter un commentaire</title>
</head>
<body>
    <h1>Ajouter un commentaire</h1>

    <?php if ($erreur): ?>
        <p style="color:red;"><?php echo htmlspecialchars($erreur); ?></p>
    <?php endif; ?>

    <form action="" method="POST">
        <textarea name="commentaire" rows="5" cols="50" placeholder="Votre commentaire ici..."></textarea><br>
        <button type="submit">Envoyer</button>
    </form>

    <p><a href="livre-or.php">Retour au livre d’or</a></p>
</body>
</html>
