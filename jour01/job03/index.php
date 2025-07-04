<?php

$boolVar = true;
$intVar = 69;
$stringVar = "LaPlateforme";
$floatVar = 6.14;

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Types de Variables PHP</title>
    <style>
        table {
            border-collapse: collapse;
            width: 50%;
        }

        th,
        td {
            border: 1px solid #333;
            padding: 8px;
        }

        th {
            background-color: #eee;
        }
    </style>
</head>

<body>

    <h2>Tableau des variables PHP</h2>

    <table>
        <thead>
            <tr>
                <th>Type</th>
                <th>Nom</th>
                <th>Valeur</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?php echo gettype($boolVar); ?></td>
                <td>boolVar</td>
                <td><?php echo $boolVar; ?></td>
            </tr>
            <tr>
                <td><?php echo gettype($intVar); ?></td>
                <td>intVar</td>
                <td><?php echo $intVar; ?></td>
            </tr>
            <tr>
                <td><?php echo gettype($stringVar); ?></td>
                <td>stringVar</td>
                <td><?php echo $stringVar; ?></td>
            </tr>
            <tr>
                <td><?php echo gettype($floatVar); ?></td>
                <td>floatVar</td>
                <td><?php echo $floatVar; ?></td>
            </tr>
        </tbody>
    </table>

</body>

</html>