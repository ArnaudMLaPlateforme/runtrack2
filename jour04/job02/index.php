<!-- Développer un algorithme qui affiche dans un tableau HTML <table> l’ensemble des
arguments $_GET et les valeurs associées.
Il doit y avoir deux colonnes : argument et valeur.
Tips :
Pour tester votre code, créez un formulaire html <form> de type GET avec différents
champs <input> de type “text” et un <input> de type “submit” pour l’envoi.
Vous pouvez ensuite afficher avec echo directement dans votre page par exemple ce
tableau :

Argument Valeur
prenom Stephane
nom Dupont -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="GET">
        Prénom: <input type="text" name="prenom">
        Nom: <input type="text" name="nom">
        <input type="submit">
    </form>
    <table>
        <thead>
            <tr>
                <th>Argument</th>
                <th>Valeur</th>
            </tr>
        </thead>
        <tbody>
            <!-- Boucle pour parcourir le tableau associatif $_GET -->
            <?php foreach ($_GET as $argument => $valeur) { ?>
                <tr>
                    <td><?php echo $argument ?></td>
                    <td><?php echo $valeur ?></td>
                </tr>
            <?php } ?>
        </tbody>

    </table>
</body>

</html>