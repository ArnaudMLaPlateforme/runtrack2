<!-- Créer un formulaire qui contient une liste déroulante nommée “style” et un bouton
submit. La liste déroulante doit proposer au moins “style1”, “style2” et “style3. Créer 3
fichiers css nommés “style1.css”, “style2.css” et “style3.css”. Chaque style doit avoir
des effets sur le design du formulaire, la couleur de background, la police d’écriture...
Lorsque l’on valide le formulaire, le style sélectionné doit être inclus et donc le visuel
doit changer. 

Pseudo-code:
Début

Afficher un formulaire HTML avec :  
    - une liste déroulante nommée "style"  
    - des options "style1", "style2", "style3"  
    - un bouton submit  

Si le formulaire est soumis (méthode POST) alors :  
    Récupérer la valeur sélectionnée dans la liste déroulante (ex : $style)  

Afficher le formulaire (avec la liste déroulante et bouton)  

Fin

-->

<?php

$style = 'style1';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $style = $_POST["style"];
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <title>Choix du style</title>
    <!-- Inclusion dynamique du fichier CSS selon le style sélectionné -->
    <style>
        <?php include $style . ".css"; ?>
    </style>
</head>
<body>

<form action="" method="POST">
    <label for="style">Choisissez un style :</label>
    <select name="style" id="style">
        <option value="style1" <?php if ($style == 'style1') echo 'selected'; ?>>style1</option>
        <option value="style2" <?php if ($style == 'style2') echo 'selected'; ?>>style2</option>
        <option value="style3" <?php if ($style == 'style3') echo 'selected'; ?>>style3</option>
    </select>
    <button type="submit">Valider</button>
</form>

</body>
</html>
