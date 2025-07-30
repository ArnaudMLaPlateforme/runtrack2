<!-- Créez une fonction nommée “leetSpeak($str)”. Cette fonction prend en paramètre une
chaîne de caractères nommée “$str”.
Elle doit retourner la chaîne de caractères “$str” convertie en leet speak. Cela signifie
qu’elle doit la modifier de sorte à ce que :
● les “A” deviennent des “4”,
● les “B” des “8”,
● les “E” des “3”,
● les “G” des “6”,
● les “L” des “1”,
● les “S” des “5”
● les “T” des “7”.
Cela est valable que l’on crie ou non (majuscules et minuscules).

Pseudo-code:
Début de la fonction leetSpeak(chaine)

    Créer un tableau lettres = ['A', 'B', 'E', 'G', 'L', 'S', 'T']
    Créer un tableau remplacements = ['4', '8', '3', '6', '1', '5', '7']

    Initialiser une chaîne vide appelée resultat

    Pour chaque caractère dans la chaîne
        Initialiser une variable trouve = faux

        Pour chaque indice i dans le tableau lettres
            Si caractère est égal à lettres[i] OU caractère est égal à lettres[i] en minuscule
                Ajouter remplacements[i] à resultat
                Mettre trouve = vrai
                Sortir de la boucle
            Fin si
        Fin pour

        Si trouve est faux
            Ajouter le caractère original à resultat
        Fin si

    Fin pour

    Retourner resultat

Fin de la fonction


-->

<?php

function leetSpeak($str) {
    
    $letters  = ['A', 'B', 'E', 'G', 'L', 'S', 'T'];
    $replaces = ['4', '8', '3', '6', '1', '5', '7'];

    $result = "";

    for ($i = 0; isset($str[$i]); $i++) {
        $found = false;

        // Vérifier si le caractère correspond à une lettre à convertir
        for ($j = 0; isset($letters[$j]); $j++) {

            // Si la lettre correspond à une lettre à remplacer
            if ($str[$i] === $letters[$j]) {

                // Alors le remplacement est ajouté dans le résultat
                $result = $result . $replaces[$j];
                // Un remplacement a été trouvé
                $found = true;
                break;
            }
        }

        // Si le caractère n'a pas été remplacé
        if (!$found) {
            $result = $result . $str[$i];
        }
    }

    return $result;
}

echo leetSpeak("ABEGLST");

?>