<!-- Créez une variable de session nommée “nbvisites”. A chaque fois que la page est
visitée, ajoutez 1. Afficher le contenu de cette variable.
Ajoutez un bouton nommé “reset” qui permet de réinitialiser ce compteur.

Début

    Démarrer la session

    Si la variable de session "nbvisites" n'existe pas ALORS
        L'initialiser à 0
    Fin Si

    Si le bouton "reset" a été cliqué (c’est-à-dire si la clé "reset" existe dans $_POST) ALORS
        Remettre la variable de session "nbvisites" à 0
    SINON
        Incrémenter la variable de session "nbvisites" de 1
    Fin Si

    Afficher le nombre de visites dans le HTML

    Afficher un formulaire HTML :
        - avec un bouton nommé "reset"
        - méthode POST

Fin -->

<?php
session_start();

// Si la variable de session "nbvisites" n'existe pas
if (!isset($_SESSION["nbvisites"])) {
    // L'initialiser à 0
    $_SESSION["nbvisites"] = 0;
}

// Si le bouton "reset" a été cliqué (si la clé "reset" existe dans $_POST)
if (isset($_POST["reset"])) {
    // Remettre la variable de session "nbvisites" à 0
    $_SESSION["nbvisites"] = 0;
} else {
    // Incrémenter la variable de session "nbvisites" de 1
    $_SESSION["nbvisites"] = $_SESSION["nbvisites"] + 1;
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
    <p>Nombre de visites : <?php echo $_SESSION["nbvisites"] ?></p>
    <form action="" method="POST">
        <input type="submit" name="reset" value="Réinitialiser">
    </form>
</body>

</html>