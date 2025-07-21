<!-- Faire un formulaire avec deux <input> de type text ayant comme nom “largeur” et
“hauteur” et un bouton submit.
Vous devez créer un algorithme qui affiche, à la validation du formulaire,
une maison telle que :
Si on entre les valeurs : largeur =10 et hauteur = 5 dans les champs, la
maison qui s’affiche sur la page doit ressembler à ceci : -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="POST">
        Largeur: <input type="text" name="largeur">
        Hauteur: <input type="text" name="hauteur">
        <input type="submit">
    </form>

    <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $largeur = $_POST["largeur"];
        $hauteur = $_POST["hauteur"];

        for ($i = 0; $i < $hauteur; $i++) {

            // Espaces à gauche (pour centrer le triangle)
            for ($espace = 0; $espace < $hauteur - $i - 1; $espace++) {
                echo "&nbsp;&nbsp;";
            }

            // Début de ligne
            echo "/";

            // Espace du milieu OU underscore sur la dernière ligne
            for ($milieu = 0; $milieu < $i * 2; $milieu++) {
                echo "_";
            }

            echo "\\";

            echo "<br />";
        }
    }

    for ($i = 0; $i < $hauteur; $i++) {
    for ($j = 0; $j < $largeur; $j++) {
        // Bord gauche et bord droit
        if ($j == 0 || $j == $largeur - 1) {
            echo "|";
        }
        // Si on est sur la dernière ligne
        elseif ($i == $hauteur - 1) {
            echo "_";
        }
        // Espaces à l'intérieur
        else {
            echo "&nbsp;&nbsp;";
        }
    }
    echo "<br />";
}


    ?>

</body>

</html>