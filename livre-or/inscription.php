<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login = $_POST["login"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];

    if ($password === $confirm_password) {
        $password_hache = password_hash($password, PASSWORD_DEFAULT);

        // Connexion à la base de données
        require_once 'db.php';

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
    <link rel="stylesheet" href="style.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
      integrity="sha512-papb+59D4a9pe6ylu6lhkT6TH+X6LTXdR5DkvfMivAX3b8IH3dQAYTtuGynUayjz1F60vGBrC7C2xY9K5PZyMw=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <link href="https://fonts.googleapis.com/css2?family=Urbanist:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>

<body>
    <?php include('header.php'); ?>

    <main>
        <section class="hero">
            <div class="hero-content">
                <section class="form-container">
                    <h2>Inscription</h2>
                    <form action="" method="POST">
                        <div class="grid">
                            <div class="input-group">
                                <label for="login">Nom d'utilisateur</label>
                                <input id="login" name="login" type="text" required />
                            </div>

                            <div class="input-group">
                                <label for="password">Mot de passe</label>
                                <input id="password" name="password" type="password" required />
                            </div>

                            <div class="input-group">
                                <label for="password">Confirmation du mot de passe</label>
                                <input id="password" name="confirm_password" type="password" required />
                            </div>
                        </div>

                        <div class="form-actions">
                            <button type="submit">S'inscrire</button>
                        </div>
                    </form>
                </section>
            </div>
        </section>
    </main>

    <h1>Inscription</h1>
    <form action="" method="POST">
        <label>Nom d'utilisateur</label><input type="text" name="login">
        <label>Mot de passe</label><input type="password" name="password">
        <label>Confirmation du mot de passe</label><input type="password" name="confirm_password">
        <input type="submit" value="S'inscrire">
    </form>
</body>

</html>