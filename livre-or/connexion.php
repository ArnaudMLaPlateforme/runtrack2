<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login = $_POST["login"];
    $password = $_POST["password"];

    // Connexion à la base de données
    $mysqli = new mysqli("localhost", "root", "root", "livreor");

    if ($mysqli->connect_error) {
        die("Erreur de connexion : " . $mysqli->connect_error);
    }

    // Préparer une requête pour chercher le login
    $stmt = $mysqli->prepare("SELECT * FROM utilisateurs WHERE login = ?");
    $stmt->bind_param("s", $login);
    $stmt->execute();
    $result = $stmt->get_result();

    // Récupérer l'utilisateur
    $user = $result->fetch_assoc();

    // Vérifier le mot de passe avec password_verify()
    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['login'] = $user['login'];
        // Redirection vers la page profil
        header("Location: profil.php");
        exit();
    } else {
        echo "Login ou mot de passe incorrect.";
    }

    $stmt->close();
    $mysqli->close();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Connexion</h1>
    <form action="" method="POST">
        Nom d'utilisateur<input type="text" name="login">
        Mot de passe<input type="password" name="password">
        <input type="submit" value="Se Connecter">
    </form>
</body>

</html>