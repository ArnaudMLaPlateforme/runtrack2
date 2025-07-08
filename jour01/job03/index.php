<?php

$variables = [
    "boolVar" => true,
    "intVar" => 10,
    "strVar" => "Chaîne de caractère",
    "floatVar" => 3.14
];

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
            <?php foreach ($variables as $name => $value): ?>
                <tr>
                    <td><?php echo gettype($value); ?></td>
                    <td><?php echo $name; ?></td>
                    <td><?php echo is_bool($value) ? ($value ? 'true' : 'false') : $value; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>