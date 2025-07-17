<!-- Créez une variable de type string nommée $str et affectez y le texte :
“Certaines choses changent, et d'autres ne changeront jamais.”
Créer un algorithme qui parcourt cette string en remplaçant le premier caractère par le
deuxième, le deuxième par le troisième etc.. et le dernier par le premier. 

Pseudo code :

    Définir une variable str contenant le texte :
        "Certaines choses changent, et d'autres ne changeront jamais."

    Créer une variable resultat vide
    Créer une variable longueur vide

    Calculer la longueur de str et la stocker dans une variable longueur

    Pour i allant de 0 jusqu'à longueur - 2 faire
        Ajouter le caractère à la position i + 1 de str à resultat
    Fin Pour

    Ajouter le premier caractère de str à la fin de resultat

    Afficher resultat

-->

<?php

$str = "Certaines choses changent, et d'autres ne changeront jamais.";
$longueur = 0;
$result = "";

// Calcul de la longueur de $str
// Boucle while pour parcourir chaque caractère de $str
// Vérification si un caractère existe à l'indice $longueur avec isset($str[$longueur])
// Tant que c’est vrai, on augmente $longueur de 1
while (isset($str[$longueur])) {
    $longueur++;
}

// Pour chaque caractère sauf le dernier, on ajoute à $result le caractère suivant dans $str
for ($i = 0; $i < $longueur - 1; $i++) {
    $result = $result . $str[$i + 1];
}

// Pour le dernier caractère, on ajoute à $result le premier caractère de $str
$result = $result . $str[0];

echo $result;

?>
