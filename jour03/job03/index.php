<!-- Créez une variable de type string nommée $str et affectez y le texte :
“I'm sorry Dave I'm afraid I can't do that”.
Créez un algorithme qui parcourt cette chaîne et affiche uniquement les voyelles.
Ex. : IoyaeIaaiIaoa -->

<?php

$str = "I'm sorry Dave I'm afraid I can't do that";
$voyelles = ['a', 'e', 'i', 'o', 'u', 'y', 'A', 'E', 'I', 'O', 'U', 'Y'];

// Boucle pour parcourir la chaîne de caractère $str
for ($i = 0; isset($str[$i]); $i++) {
    // Boucle pour parcourir le tableau de voyelles
    for ($j = 0; isset($voyelles[$j]); $j++) {
        if ($str[$i] === $voyelles[$j]) {
            
            echo $str[$i];
        }
    }
}

?>
