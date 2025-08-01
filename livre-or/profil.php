<?php
session_start();

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    header("Location: connexion.php");
    exit();
}

// Connexion à la base de données
require_once 'db.php';

// Récupérer les infos actuelles de l'utilisateur pour pré-remplir le formulaire
$user_id = $_SESSION['user_id'];
$stmt = $mysqli->prepare("SELECT login FROM utilisateurs WHERE id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

$login = $user['login'];
$message = "";

// Si le formulaire est soumis, on traite la modification
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $new_login = $_POST['login'];
    $new_password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if ($new_password !== $confirm_password) {
        $message = "Les mots de passe ne correspondent pas.";
    } else {
        if (!empty($new_password)) {
            // On hash le nouveau mot de passe
            $password_hache = password_hash($new_password, PASSWORD_DEFAULT);

            // On met à jour login et password
            $stmt = $mysqli->prepare("UPDATE utilisateurs SET login = ?, password = ? WHERE id = ?");
            $stmt->bind_param("ssi", $new_login, $password_hache, $user_id);
        } else {
            // On met à jour seulement le login
            $stmt = $mysqli->prepare("UPDATE utilisateurs SET login = ? WHERE id = ?");
            $stmt->bind_param("si", $new_login, $user_id);
        }

        if ($stmt->execute()) {
            $message = "Profil mis à jour avec succès.";
            $_SESSION['login'] = $new_login; // Mettre à jour la session
            $login = $new_login; // Mettre à jour la variable pour réafficher dans le formulaire
        } else {
            $message = "Erreur lors de la mise à jour.";
        }
        $stmt->close();
    }
}

$mysqli->close();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <title>Profil</title>
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
                <section class="form-container">
                    <h2>Modifier votre profil</h2>
                    <?php if ($message): ?>
                        <p><?= htmlspecialchars($message) ?></p>
                    <?php endif; ?>
                    <form action="" method="POST">
                        <div class="grid">
                            <div class="input-group">
                                <label for="login">Nom d'utilisateur: </label>
                                <input type="text" name="login" value="<?= htmlspecialchars($login) ?>" required>
                            </div>

                            <div class="input-group">
                                <label>Nouveau mot de passe: </label><input type="password" name="password">
                            </div>

                            <div class="input-group">
                                <label>Confirmer mot de passe: </label><input type="password" name="confirm_password">
                            </div>
                        </div>

                        <div class="form-actions">
                            <button type="submit">Mettre à jour</button>
                        </div>
                    </form>
                </section>
            </div>
        </section>
    </main>

    <h1>Modifier votre profil</h1>
    <?php if ($message): ?>
        <p><?= htmlspecialchars($message) ?></p>
    <?php endif; ?>
    <form action="" method="POST">
        <label>Login: </label><input type="text" name="login" value="<?= htmlspecialchars($login) ?>" required><br><br>
        <label>Nouveau mot de passe: </label><input type="password" name="password"><br><br>
        <label>Confirmer mot de passe: </label><input type="password" name="confirm_password"><br><br>
        <input type="submit" value="Mettre à jour">
    </form>
</body>

</html>