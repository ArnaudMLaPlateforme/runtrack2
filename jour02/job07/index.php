<?php

$hauteur = 5;

for ($i = 0; $i < $hauteur; $i++) {

    // Calcule du nombre d'espaces à gauche pour centrage
    // Chaque "bloc" central fait 3 caractères visuels (1 underscore + 1 espace = 3 avec HTML spacing)
    $espacesGauche = ($hauteur - $i - 1) * 3;

    // Affiche les espaces pour centrer
    for ($espace = 0; $espace < $espacesGauche; $espace++) {
        echo "&nbsp;";
    }

    // Bord gauche du triangle
    echo "/";

    // Centre : espaces ou "_&nbsp;" selon la ligne
    for ($milieu = 0; $milieu < $i * 2; $milieu++) {
        if ($i == $hauteur - 1) {
            echo "_&nbsp;";
        } else {
            echo "&nbsp;&nbsp;&nbsp;"; 
        }
    }

    // Bord droit du triangle
    echo "\\";

    // Retour à la ligne
    echo "<br />";
}


// $hauteur = 10;

// for ($i = 0; $i < $hauteur; $i++) {

//     // Espaces à gauche (pour centrer le triangle)
//     for ($espace = 0; $espace < $hauteur - $i - 1; $espace++) {
//         echo "&nbsp;&nbsp;";
//     }

//     // Début de ligne
//     echo "/";

//     // Espace du milieu OU underscore sur la dernière ligne
//     for ($milieu = 0; $milieu < $i * 2; $milieu++) {
//         // Si dernière ligne
//         if ($i == $hauteur - 1) {
//             echo "_";
//         } else {
//             echo "&nbsp;&nbsp;";
//         }
//     }

//     echo "\\";

//     echo "<br />";
// }

?>
