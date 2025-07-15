<?php

$str = "Tous ces instants seront perdus dans le temps comme les larmes sous la pluie.";

// Boucle pour parcourir les caractères de $str
// isset permet de vérifier si un caractère existe à l'index $i
// $i = $i +2 incrémente de 2 et permet de sauter 1 caractère sur 2
for ($i = 0; isset($str[$i]); $i = $i +2) { 
    echo $str[$i]; 
}
