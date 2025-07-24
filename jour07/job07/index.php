<!-- Créez un formulaire <form> qui contient :
● un champ <input> nommé “str” de type “text”,
● une liste déroulante <select> nommée “fonction”
● un bouton <button> submit.
Lorsque vous validez le formulaire, vous devez appliquer des transformations à “str” en
fonction de l’option <option> choisie dans la liste déroulante.
Les choix possibles sont :
● “gras” : une fonction qui prend en paramètre “str” : gras($str). Elle écrit “str” en
mettant en gras (<b>) les mots commençant par une lettre majuscule.
● “cesar” : une fonction qui prend en paramètre “$str” et un nombre “$decalage”
(qui vaut 2 par défaut) : cesar($str, $decalage). $str doit s’afficher en décalant
chaque caractère d’un nombre égal à “$decalage”.
ex : Si $decalage vaut 1 alors “e” devient “f”. Si décalage vaut 3 alors “z” devient
“c”.
● “plateforme”, une fonction qui prend en paramètre “$str” : plateforme($str).
Elle affiche “$str” en ajoutant un “_” aux mots finissant par “me”. 

Pseudocode
Début

Afficher un formulaire avec :
    - un champ texte nommé "str"
    - une liste déroulante nommée "fonction"
        - Option 1 : "gras"
        - Option 2 : "cesar"
        - Option 3 : "plateforme"
    - un bouton pour valider (submit)

Quand on clique sur "Valider" :
    Récupérer la valeur du champ texte -> $str
    Récupérer le choix de l'utilisateur dans la liste -> $fonction

    Si la fonction choisie est "gras" alors :
        Appeler la fonction gras($str)
        Elle affiche les mots avec une majuscule en <b>gras</b>

    Sinon si la fonction choisie est "cesar" alors :
        Appeler la fonction cesar($str, $decalage)
        (par défaut le décalage vaut 2)
        Elle affiche la chaîne en décalant les lettres (ex: a → c, z → b)

    Sinon si la fonction choisie est "plateforme" alors :
        Appeler la fonction plateforme($str)
        Elle affiche les mots normalement sauf ceux qui finissent par "me"
        Ces mots-là reçoivent un "_" à la fin

Fin
-->

<?php
require 'gras.php';
require 'cesar.php';
require 'plateforme.php';


// Traitement du formulaire
$resultat = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $str = $_POST["str"];
    $fonction = $_POST["fonction"];

    if ($fonction == "gras") {
        $resultat = gras($str);
    } elseif ($fonction == "cesar") {
        $resultat = cesar($str);
    } elseif ($fonction == "plateforme") {
        $resultat = plateforme($str);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST">
        <label>Texte :</label>
        <input type="text" name="str" required><br><br>

        <label>Choisissez une fonction :</label>
        <select name="fonction" required>
            <option value="gras">Gras</option>
            <option value="cesar">César</option>
            <option value="plateforme">Plateforme</option>
        </select><br><br>

        <button type="submit">Appliquer</button>
    </form>

    <h3>Résultat :</h3>
    <p><?php echo $resultat; ?></p>
</body>
</html>