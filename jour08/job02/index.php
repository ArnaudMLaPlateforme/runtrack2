<!-- Créez un cookie nommé “nbvisites”. A chaque fois que la page est visitée, ajoutez 1.
Afficher le contenu du cookie.
Ajoutez un bouton nommé “reset” qui permet de réinitialiser ce compteur.
 
Début

Si le bouton "reset" a été cliqué alors
    Supprimer le cookie "nbvisites" (en le faisant expirer)
    Initialiser le compteur de visites à 0
Sinon
    Si le cookie "nbvisites" existe alors
        Récupérer la valeur du cookie dans "visites"
        Ajouter 1 à "visites"
    Sinon
        Initialiser "visites" à 1 (première visite)
    FinSi
    Mettre à jour le cookie "nbvisites" avec la valeur "visites"
    Définir une durée de vie du cookie à 1 heure
FinSi

Fin


-->

<?php

// Si le bouton "reset" a été cliqué (formulaire soumis)
if (isset($_POST["reset"])) {
    // Supprimer le cookie en le faisant expirer dans le passé
    setcookie("nbvisites", "", time() - 3600);
    // Réinitialiser le compteur à 0
    $visites = 0;
} else {
    // Sinon, si le cookie existe déjà
    if (isset($_COOKIE["nbvisites"])) {
        // Récupérer la valeur du cookie
        $visites = $_COOKIE["nbvisites"];
        // Incrémenter le compteur de visites
        $visites++;
    } else {
        // Si le cookie n'existe pas, c'est la première visite
        $visites = 1;
    }
    // Mettre à jour le cookie avec la nouvelle valeur
    // Le cookie durera 1 heure
    setcookie("nbvisites", $visites, time() + 3600);
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