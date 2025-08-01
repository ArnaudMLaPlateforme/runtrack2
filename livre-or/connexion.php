<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login = $_POST["login"];
    $password = $_POST["password"];

    // Connexion à la base de données
    require_once 'db.php';

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
        $erreur = "Login ou mot de passe incorrect.";
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
                    <h2>Connexion</h2>
                    <?php if (isset($erreur)): ?>
                        <div class="error-message"><?php echo htmlspecialchars($erreur); ?></div>
                    <?php endif; ?>
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
                        </div>

                        <div class="form-actions">
                            <button type="submit">Se Connecter</button>
                        </div>
                    </form>
                </section>
            </div>
        </section>
    </main>

</body>

</html>