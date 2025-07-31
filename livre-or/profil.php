<?php
session_start();

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    header("Location: connexion.php");
    exit();
}

// Connexion à la base de données
$mysqli = new mysqli("localhost", "root", "root", "livreor");
if ($mysqli->connect_error) {
    die("Erreur de connexion : " . $mysqli->connect_error);
}

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
</head>
<body>
    <h1>Modifier votre profil</h1>
    <?php if ($message): ?>
        <p><?= htmlspecialchars($message) ?></p>
    <?php endif; ?>
    <form action="" method="POST">
        Login: <input type="text" name="login" value="<?= htmlspecialchars($login) ?>" required><br><br>
        Nouveau mot de passe: <input type="password" name="password"><br><br>
        Confirmer mot de passe: <input type="password" name="confirm_password"><br><br>
        <input type="submit" value="Mettre à jour">
    </form>
</body>
</html>
