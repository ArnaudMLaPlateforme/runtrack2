<!-- Créez un formulaire de connexion qui contient un input de type de text nommé
“prenom” et un bouton submit nommé “connexion”. Lorsque l’on valide le formulaire, le
prénom est ajouté dans un cookie. Si un utilisateur a déjà entré son prénom, n'affichez
plus le formulaire de connexion. A la place, écrivez “Bonjour prenom !” et ajouter un
bouton “Déconnexion” nommé “deco”. Lorsque l’utilisateur se déconnecte, il faut à
nouveau afficher le formulaire de connexion.

Début
Démarrer la session

  Si le bouton "Déconnexion" est cliqué alors
    Supprimer le cookie nommé "prenom" (en le mettant à une date passée)
    Recharger la page pour mettre à jour l'affichage
  Fin Si

  Si le formulaire de connexion est soumis ET que le champ "prenom" n'est pas vide alors
    Récupérer le prénom saisi (enlever les espaces inutiles)
    Créer un cookie nommé "prenom" avec ce prénom (valable 1 heure)
    Recharger la page pour mettre à jour l'affichage
  Fin Si

  Afficher la page HTML :
    Si le cookie "prenom" existe et n'est pas vide alors
      Afficher "Bonjour [prenom] !"
      Afficher un bouton "Déconnexion"
    Sinon
      Afficher un formulaire avec un champ texte "prenom" et un bouton "Connexion"
    Fin Si

Fin

 -->

<?php
session_start();

// Si le bouton Déconnexion est cliqué alors
if (isset($_POST["deco"])) {
    // Supprimer le cookie nommé "prenom"
    setcookie("prenom", "", time() - 3600);
    // Recharger la page pour mettre à jour l'affichage
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}

// Si le formulaire de connexion est soumis ET que le champ "prenom" n'est pas vide 
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["prenom"])) {
    // Récupérer le prénom saisi
    $prenom = $_POST["prenom"];
    //Créer un cookie nommé "prenom" avec ce prénom (valable 1 heure)
    setcookie("prenom", $prenom, time() + 3600);
    // Recharger la page pour mettre à jour l'affichage
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Connexion par cookie</title>
</head>

<body>

    <?php
    // Si le cookie "prenom" existe et n'est pas vide
    if (isset($_COOKIE['prenom']) && !empty($_COOKIE['prenom'])) {
        // Afficher le message de bienvenue
        echo "<p>Bonjour " . htmlspecialchars($_COOKIE['prenom']) . " !</p>";
    ?>
        <!-- Et afficher le bouton déconnexion -->
        <form method="POST" action="">
            <input type="submit" name="deco" value="Déconnexion">
        </form>
    <?php
    } else {
    ?>
        <!-- Sinon afficher le formulaire de connexion -->
        <form method="POST" action="">
            <input type="text" name="prenom" placeholder="Entrez votre prénom">
            <input type="submit" name="connexion" value="Connexion">
        </form>
    <?php
    }
    ?>

</body>

</html>