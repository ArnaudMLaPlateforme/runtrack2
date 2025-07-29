<!-- Créez un cookie nommé “nbvisites”. A chaque fois que la page est visitée, ajoutez 1.
Afficher le contenu du cookie.
Ajoutez un bouton nommé “reset” qui permet de réinitialiser ce compteur.
 
Début

    Donner un nom au cookie ("nbvisites")

    Si l'utilisateur a cliqué sur le bouton "reset" ALORS
        - Remettre la valeur du cookie à 0
        - Stocker 0 dans une variable "visites" (pour l'affichage)
    SINON
        - Si le cookie existe déjà ALORS
            - Récupérer sa valeur en lui ajoutant 1 et stocker le nouveau total dans la 
            variable "visites"
        SINON
            - C'est la première visite
            - Mettre la variable "visites" à 1

        - Mettre à jour le cookie avec la nouvelle valeur de "visites"

    FIN SI

    Afficher le texte : "Nombre de visites : [valeur de visites]"

    Afficher un formulaire avec un bouton "Reset"
    (le formulaire utilise la méthode POST)

Fin

-->

<?php

$cookie_name = "nbvisites";

// Si l'utilisateur a cliqué sur le bouton "reset"
if (isset($_POST["reset"])) {

    // Remettre la valeur du cookie à 0
    setcookie($cookie_name, 0);
    $visites = 0;

} else {

    // Si le cookie existe déjà
    if (isset($_COOKIE[$cookie_name])) {

        // Récupérer sa valeur en lui ajoutant 1 et stocker le nouveau total dans la variable "visites"
        $visites = $_COOKIE[$cookie_name] + 1;
    } else {
        // C'est la première visite
        $visites = 1;
    }

    // Mettre à jour le cookie avec la nouvelle valeur de "visites"
    setcookie($cookie_name, $visites);
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
    <p>Nombre de visites : <?php echo $visites ?></p>
    <form action="" method="POST">
        <input type="submit" value="Reset" name="reset">
    </form>
</body>

</html>