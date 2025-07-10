<?php

$hauteur = 5;

for ($i = 0; $i < $hauteur; $i++) {

    // Espaces à gauche (pour centrer le triangle)
    for ($espace = 0; $espace < $hauteur - $i - 1; $espace++) {
        echo "&nbsp;&nbsp;";
    }

    // Début de ligne
    echo "/";

    // Espace du milieu OU underscore sur la dernière ligne
    for ($milieu = 0; $milieu < $i * 2; $milieu++) {
        // Si dernière ligne
        if ($i == $hauteur - 1) {
            echo "_";
        } else {
            echo "&nbsp;&nbsp;";
        }
    }

    echo "\\";

    echo "<br />";
}

?>
