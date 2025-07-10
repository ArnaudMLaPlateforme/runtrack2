<?php

$largeur = 20;
$hauteur = 10;

for ($i = 0; $i < $hauteur; $i++) {
    for ($j = 0; $j < $largeur; $j++) {
        // Si on est sur la première ou dernière ligne
        // ou la première ou dernière colonne : on affiche "*"
        if ($i == 0 || $i == $hauteur - 1 || $j == 0 || $j == $largeur -1) {
            echo "*&nbsp;";
        } else {
            echo "&nbsp;&nbsp;&nbsp;"; // Double espace vide
        }
    }
    echo "<br />";
}

?>
