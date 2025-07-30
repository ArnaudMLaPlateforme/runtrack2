<!-- ● “gras” : une fonction qui prend en paramètre “str” : gras($str). Elle écrit “str” en
mettant en gras (<b>) les mots commençant par une lettre majuscule.
 
Début de la fonction gras(texte)

    Initialiser une variable resultat comme chaîne vide
    Initialiser une variable mot comme chaîne vide

    Pour chaque caractère dans texte :
        Si le caractère n'est pas un espace :
            Ajouter le caractère à mot
        Sinon :
            Si le premier caractère de mot est une lettre majuscule (entre 'A' et 'Z') :
                Ajouter "<b>" + mot + "</b>" à resultat
            Sinon :
                Ajouter mot à resultat
            Fin si

            Ajouter un espace à resultat
            Réinitialiser mot à une chaîne vide
        Fin si
    Fin pour

    // Dernier mot (s’il n’y a pas d’espace après)
    Si mot n’est pas vide :
        Si le premier caractère de mot est entre 'A' et 'Z' :
            Ajouter "<b>" + mot + "</b>" à resultat
        Sinon :
            Ajouter mot à resultat
        Fin si
    Fin si

    Retourner resultat

Fin de la fonction -->

<?php

function gras($str) {
    $resultat = "";  // Chaîne finale à retourner
    $mot = "";       // Mot en cours de construction

    for ($i = 0; isset($str[$i]); $i++) {
        $char = $str[$i];

        // Si le caractère n'est pas un espace
        if ($char != ' ') {
            // Le caractère est ajouté au mot
            $mot = $mot . $char;
        } else {
            // Si le premier caractère du mot est une lettre majuscule (entre 'A' et 'Z')
            if ($mot[0] >= 'A' && $mot[0] <= 'Z') {
                // Le mot sera en gras
                $resultat = $resultat . "<b>" . $mot . "</b>";
            } else {
                $resultat = $resultat . $mot;
            }

            $resultat = $resultat . " "; // On ajoute l’espace
            $mot = "";        // On réinitialise le mot
        }
    }

    // Dernier mot (s’il n’y a pas d’espace après)
    if ($mot != "") {
        if ($mot[0] >= 'A' && $mot[0] <= 'Z') {
            $resultat .= "<b>" . $mot . "</b>";
        } else {
            $resultat .= $mot;
        }
    }

    return $resultat;
}

?>