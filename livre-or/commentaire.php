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
        require_once 'db.php';

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
                <h2>AJOUTER UN COMMENTAIRE</h2>
                <?php if ($erreur): ?>
                    <p style="color:red;"><?php echo htmlspecialchars($erreur); ?></p>
                <?php endif; ?>

                <form action="" method="POST">
                    <textarea name="commentaire" rows="5" cols="50" placeholder="Votre commentaire ici..."></textarea><br>
                    <button type="submit" class="btn-cta">Envoyer</button>
                </form>

                <p><a href="livre-or.php" class="btn-cta">Retour au livre d’or</a></p>

            </div>
        </section>
    </main>

</body>

</html>