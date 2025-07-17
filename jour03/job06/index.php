<!-- Créez une variable de type string nommée $str et affectez y le texte :
“Les choses que l'on possède finissent par nous posséder."
Créez un algorithme qui parcourt et écrit cette chaine à l’envers.
Ex. : redessop suon rap tnessinif edessop no'l euq sesohc seL -->


<?php

$str = "Les choses que l'on possede finissent par nous posseder.";
$longueur = 0;

// Calcul de la longueur de $str
// Boucle while pour parcourir chaque caractère de $str
// Vérification si un caractère existe à l'indice $longueur avec isset($str[$longueur])
// Tant que c’est vrai, on augmente $longueur de 1
while (isset($str[$longueur])) {
    $longueur++;
}

// On commence à la fin de $str ($longueur - 1) et on va jusqu'au début de $str
for ($i = $longueur - 1; $i >= 0; $i--) {

    echo $str[$i];
}

?>