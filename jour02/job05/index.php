<?php

// On commence à 2 car 1 n'est pas un nombre premier
for ($nombre = 2; $nombre <= 1000; $nombre++) {

    $estPremier = true;

    // On vérifie s'il est divisible par un autre nombre (sauf lui-même et 1)
    for ($diviseur = 2; $diviseur < $nombre; $diviseur++) {
        
        if ($nombre % $diviseur == 0) {
            $estPremier = false;
            break; // on sort de la boucle car on a trouvé un diviseur
        }
    }

    // Si on n'a trouvé aucun diviseur, alors c'est un nombre premier
    if ($estPremier) {
        echo $nombre . "<br />";
    }
}

?>
