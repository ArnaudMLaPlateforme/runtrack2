<!-- ● “plateforme”, une fonction qui prend en paramètre “$str” : plateforme($str).
Elle affiche “$str” en ajoutant un “_” aux mots finissant par “me”. 

Pseudocode
Début de la fonction plateforme($str)

Initialiser une variable resultat comme chaîne vide
Initialiser une variable mot comme chaîne vide

Pour chaque caractère dans $str faire :

    Si le caractère n’est pas un espace :
        Ajouter le caractère à la variable mot

    Sinon (le caractère est un espace) :
        Si le mot se termine par les lettres "me" alors :
            Ajouter mot + "_" à resultat
        Sinon :
            Ajouter mot à resultat
        Fin Si

        Ajouter un espace à resultat
        Réinitialiser mot à une chaîne vide

Fin Pour

// Vérifier le dernier mot s’il n’est pas suivi d’un espace
Si mot n’est pas vide :
    Si le mot se termine par "me" alors :
        Ajouter mot + "_" à resultat
    Sinon :
        Ajouter mot à resultat
    Fin Si
Fin Si

Retourner resultat

Fin de la fonction -->



<?php

function plateforme($str)
{
    $resultat = "";
    $mot = "";
    $i = 0;

    // Parcours de chaque caractère de $str
    while (isset($str[$i])) {
        $char = $str[$i];

        // Si le caractère n’est pas un espace
        if ($char != " ") {
            // Ajouter le caractère à la variable mot
            $mot = $mot . $char;
        } else {

            // Si c'est un espace, cela veut dire que le mot est terminé
            // Calculer la longueur du mot
            $longueur = 0;
            while (isset($mot[$longueur])) {
                $longueur++;
            }
            
            //  Vérifier les deux dernières lettres
            if ($longueur >= 2 && $mot[$longueur - 2] == "m" && $mot[$longueur - 1] == "e") {
                // Ajouter mot + "_" à resultat
                $resultat = $resultat . $mot . "_";
            } else {
                // Ajouter mot à resultat
                $resultat = $resultat . $mot;
            }
            // Ajouter un espace à resultat
            $resultat = $resultat . " ";
            // Réinitialiser mot à une chaîne vide
            $mot = "";
        }

        $i++;
    }

    // Vérification du dernier mot (non suivi d'espace)
    // Si mot n’est pas vide 
    if ($mot != "") {

        // Calculer la longueur du mot
        $longueur = 0;
        while (isset($mot[$longueur])) {
            $longueur++;
        }

        // Vérifier les deux dernières lettres
        if ($longueur >= 2 && $mot[$longueur - 2] == "m" && $mot[$longueur - 1] == "e") {
            // Ajouter mot + "_" à resultat
            $resultat = $resultat . $mot . "_";
        } else {
            //  Ajouter mot à resultat
            $resultat = $resultat . $mot;
        }
    }

    return $resultat;
}

?>
