<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login = $_POST["login"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];

    if ($password === $confirm_password) {
        $password_hache = password_hash($password, PASSWORD_DEFAULT);

        // Connexion à la base de données
        $mysqli = new mysqli("localhost", "root", "root", "livreor");

        // Vérifie la connexion
        if ($mysqli->connect_error) {
            die("Erreur de connexion : " . $mysqli->connect_error);
        }

        // Préparation et exécution de la requête
        $stmt = $mysqli->prepare("INSERT INTO utilisateurs (login, password) VALUES (?, ?)");
        $stmt->bind_param("ss", $login, $password_hache);

        if ($stmt->execute()) {
            // Redirection vers la page de connexion
            header("Location: connexion.php");
            exit();
        } else {
            echo "Erreur lors de l'inscription.";
        }

        $stmt->close();
        $mysqli->close();
    }
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
    <h1>Inscription</h1>
    <form action="" method="POST">
        Nom d'utilisateur<input type="text" name="login">
        Mot de passe<input type="password" name="password">
        Confirmation du mot de passe<input type="password" name="confirm_password">
        <input type="submit" value="S'inscrire">
    </form>
</body>

</html>