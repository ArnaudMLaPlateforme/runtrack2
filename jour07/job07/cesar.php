<!-- Début de la fonction cesar(chaine, decalage = 2)

    Créer un tableau alphabet avec les lettres 'a' à 'z'
    Créer un tableau alphabetMaj avec les lettres 'A' à 'Z'

    Initialiser une variable resultat comme chaîne vide

    Pour chaque caractère dans la chaine :
        Mettre le caractère courant dans une variable char
        Mettre une variable trouve à faux

        // Vérifier si le caractère est une lettre minuscule
        Pour chaque lettre de alphabet (indice j) :
            Si char est égal à cette lettre :
                Calculer la nouvelle position : (j + decalage) modulo 26
                Ajouter la lettre de la nouvelle position à resultat
                Mettre trouve à vrai
                Sortir de la boucle
            Fin si
        Fin pour

        // Vérifier si le caractère est une lettre majuscule
        Si trouve est faux :
            Pour chaque lettre de alphabetMaj (indice j) :
                Si char est égal à cette lettre :
                    Calculer la nouvelle position : (j + decalage) modulo 26
                    Ajouter la lettre de la nouvelle position à resultat
                    Mettre trouve à vrai
                    Sortir de la boucle
                Fin si
            Fin pour
        Fin si

        // Si ce n’est ni une majuscule ni une minuscule
        Si trouve est toujours faux :
            Ajouter le caractère original à resultat
        Fin si

    Fin pour

    Retourner resultat

Fin de la fonction -->


<?php

function cesar($str, $decalage = 2) {
    // Alphabet en minuscules
    $alphabet = [
        'a','b','c','d','e','f','g','h','i','j','k','l','m',
        'n','o','p','q','r','s','t','u','v','w','x','y','z'
    ];

    // Alphabet en majuscules
    $alphabetMaj = [
        'A','B','C','D','E','F','G','H','I','J','K','L','M',
        'N','O','P','Q','R','S','T','U','V','W','X','Y','Z'
    ];

    $resultat = "";

    // Parcourir chaque caractère de la chaîne
    for ($i = 0; isset($str[$i]); $i++) {
        $char = $str[$i];
        $trouve = false;

        // Recherche dans l'alphabet minuscule
        for ($j = 0; isset($alphabet[$j]); $j++) {
            if ($char == $alphabet[$j]) {
                $nouvellePosition = ($j + $decalage) % 26;
                $resultat .= $alphabet[$nouvellePosition];
                $trouve = true;
                break;
            }
        }

        // Recherche dans l'alphabet majuscule
        if (!$trouve) {
            for ($j = 0; isset($alphabetMaj[$j]); $j++) {
                if ($char == $alphabetMaj[$j]) {
                    $nouvellePosition = ($j + $decalage) % 26;
                    $resultat .= $alphabetMaj[$nouvellePosition];
                    $trouve = true;
                    break;
                }
            }
        }

        // Si ce n'est ni une majuscule ni une minuscule, on garde le caractère
        if (!$trouve) {
            $resultat .= $char;
        }
    }

    return $resultat;
}


?>