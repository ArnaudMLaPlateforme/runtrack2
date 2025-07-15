<!-- Créez une variable de type string nommée $str et affectez y le texte :
“On n’est pas le meilleur quand on le croit mais quand on le sait”.

Créez un dictionnaire (tableau keys/values) nommé $dic qui a comme keys
“consonnes” et “voyelles”. 

Créez un algorithme qui parcourt, compte et stocke le nombre d'occurrences de consonnes 
et de voyelles de $str.
Affichez ces résultats dans un tableau <table> html qui a comme <thead> “Voyelles” et
“Consonnes”.. -->

<?php

$str = "On n’est pas le meilleur quand on le croit mais quand on le sait";
$voyelles = ['a', 'e', 'i', 'o', 'u', 'y', 'A', 'E', 'I', 'O', 'U', 'Y'];

// On initialise un tableau associatif pour compter le nombre de voyelles et de consonnes
$dic = [
    "consonnes" => 0,
    "voyelles" => 0
];

// Parcours de la chaîne de caractère $str
for ($i = 0; isset($str[$i]); $i++) {
    $caractere = $str[$i];
    $estVoyelle = false;

    // Vérifier si le caractère est une voyelle
    for ($j = 0; isset($voyelles[$j]); $j++) {
        if ($caractere == $voyelles[$j]) {
            $estVoyelle = true;
        }
    }

    // Vérifier si c'est une lettre (A-Z ou a-z)
    if (
        ($caractere >= 'A' && $caractere <= 'Z') || ($caractere >= 'a' && $caractere <= 'z')
    ) {
        // Si c'est une voyelle
        if ($estVoyelle) {
            // On incrémente voyelles de 1
            $dic["voyelles"]++;
        } else {
            // Sinon on incrémente consonnes de 1
            $dic["consonnes"]++;
        }
    }
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <title>Compteur</title>
    <style>
        table {
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid black;
            padding: 8px 15px;
            text-align: center;
        }

        thead {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <table>
        <thead>
            <tr>
                <th>Voyelles</th>
                <th>Consonnes</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?= $dic["voyelles"] ?></td>
                <td><?= $dic["consonnes"] ?></td>
            </tr>
        </tbody>
    </table>
</body>

</html>