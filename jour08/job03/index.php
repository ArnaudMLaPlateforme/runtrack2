<!-- Créez un formulaire qui contient un input de type de text nommé “prenom” et un bouton
submit. Lorsque l’on valide le formulaire, le prénom est ajouté dans une variable de
session. Afficher l’ensemble des prénoms.
Ajoutez un bouton nommé “reset” qui permet de réinitialiser la liste.

Début

    Démarrer la session

    Si le bouton "reset" a été cliqué (si $_POST contient "reset") ALORS
        - Supprimer la variable de session qui contient les prénoms
    FIN SI

    Si le formulaire a été soumis ET qu’un prénom a été saisi ALORS
        - Récupérer la valeur du champ "prenom"
        
        - Si la liste des prénoms n'existe pas encore dans la session ALORS
            - Créer une liste vide dans la session
        FIN SI

        - Ajouter le prénom saisi à la liste de prénoms dans la session
    FIN SI

    Afficher un formulaire HTML contenant :
        - un champ de texte nommé "prenom"
        - un bouton "Envoyer"
        - un bouton "reset"

    Afficher tous les prénoms enregistrés dans la session (sous forme de liste)

Fin -->

<?php
session_start();

// Réinitialisation si le bouton "reset" est cliqué
if (isset($_POST["reset"])) {
    unset($_SESSION["prenoms"]);
}

// Si un prénom a été envoyé
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["prenom"])) {
    $prenom = trim($_POST["prenom"]);

    // Créer la liste si elle n'existe pas
    if (!isset($_SESSION["prenoms"])) {
        $_SESSION["prenoms"] = [];
    }

    // Ajouter le prénom à la liste
    $_SESSION["prenoms"][] = $prenom;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des prénoms</title>
</head>
<body>
    <form action="" method="POST">
        <input type="text" name="prenom" placeholder="Entrez un prénom">
        <input type="submit" value="Envoyer" name="envoyer">
        <input type="submit" value="Reset" name="reset">
    </form>

    <?php if (!empty($_SESSION["prenoms"])) { ?>
        <ul>
            <?php foreach ($_SESSION["prenoms"] as $prenom) : ?>
                <li><?= htmlspecialchars($prenom) ?></li>
            <?php endforeach; ?>
        </ul>
    <?php } ?>
</body>
</html>
