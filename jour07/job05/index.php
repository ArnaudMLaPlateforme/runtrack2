<!-- Créez une fonction nommée “occurrences($str, $char)”.
Cette fonction prend en paramètre une chaîne de caractères nommée “$str” et un
caractère nommé “$char”.
Elle doit retourner le nombre d'occurrences du caractère “$char” dans “$str”.
Exemple : si $str = “Bonjour” et $char=”o” alors le nombre d'occurrences de $char dans
$str sera : 2 

Pseudo-code:
Début de la fonction occurrences(chaîne, caractère)

    Initialiser un compteur à 0

    Pour chaque lettre dans la chaîne
        Si la lettre est égale au caractère recherché
            Ajouter 1 au compteur
        Fin si
    Fin pour

    Retourner la valeur du compteur

Fin de la fonction

-->

<?php

function occurences($str, $char){
    $count = 0;

    for ($i=0; isset($str[$i]) ; $i++) { 
        if ($str[$i] == $char) {
            $count++;
        }
    }

    return $count;
}

$result = occurences("Bonjour", "o");
echo "le nombre d'occurrences de caractère dans
la chaîne est : $result";

?>