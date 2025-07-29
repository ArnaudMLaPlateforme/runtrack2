<!-- Faire un formulaire de connexion de type POST (se demander, pourquoi pas GET ?)
ayant deux champs <input> nommés username et password.
Après validation du formulaire :
● si le username est “John” ET le password est “Rambo” afficher :
“C’est pas ma guerre”
● sinon afficher : “Votre pire cauchemar”. -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="POST">
        Username: <input type="text" name="username">
        Password: <input type="text" name="password">
        <input type="submit">
    </form>

    <?php

        // Vérification si le formulaire a été soumis avec la méthode POST
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = $_POST["username"];
            $password = $_POST["password"];

            if ($username === "John" && $password === "Rambo") {
                echo "C’est pas ma guerre";
            } else {
                echo "Votre pire cauchemar";
            }
        }

    ?>
</body>

</html>