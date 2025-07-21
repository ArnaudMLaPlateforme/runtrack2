<!-- Développez un algorithme qui affiche le nombre d’arguments $_POST.
Tips :
Pour tester votre code, créez un formulaire html <form> de type POST avec différents
champs <input> de type “text” et un <input> de type “submit” pour l’envoi.
Vous pouvez ensuite afficher avec echo directement dans votre page par exemple :
“Le nombre d’argument POST envoyé est : “ 

Pseudo-code : 
Début

Initialiser une variable compteur à 0

Pour chaque paire (clé, valeur) dans le tableau $_POST :
    Incrémenter compteur de 1
Fin Pour

Afficher : "Le nombre d’arguments POST envoyés est : " suivi de compteur

Fin

-->

<?php

$count = 0;

foreach ($_POST as $key => $value) {
    $count++;
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
    <form action="" method="POST">
        Nom: <input type="text" name="name"><br>
        E-mail: <input type="text" name="email"><br>
        <input type="submit">
    </form>
    <p>Le nombre d’argument GET envoyé est : <?php echo $count ?></p>
</body>
</html>