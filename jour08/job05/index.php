<?php
session_start();

// Si aucune grille n’existe encore → on la crée
if (!isset($_SESSION['grille'])) {
    $_SESSION['grille'] = [
        ['-', '-', '-'],
        ['-', '-', '-'],
        ['-', '-', '-']
    ];
    $_SESSION['joueur'] = 'X';
    $_SESSION['message'] = '';
    $_SESSION['fin'] = false;
}

// Si bouton reset cliqué
if (isset($_POST['reset'])) {
    $_SESSION['grille'] = [
        ['-', '-', '-'],
        ['-', '-', '-'],
        ['-', '-', '-']
    ];
    $_SESSION['joueur'] = 'X';
    $_SESSION['message'] = '';
    $_SESSION['fin'] = false;
}

// Si une case a été cliquée et que la partie n'est pas finie
if (isset($_POST['cellule']) && $_SESSION['fin'] === false) {
    $valeurs = explode('-', $_POST['cellule']); // ex: "0-2" => [0, 2]
    $ligne = $valeurs[0];
    $colonne = $valeurs[1];

    // Si la case est vide
    if ($_SESSION['grille'][$ligne][$colonne] === '-') {
        $_SESSION['grille'][$ligne][$colonne] = $_SESSION['joueur'];

        // Vérifie les lignes
        for ($i = 0; $i < 3; $i++) {
            if ($_SESSION['grille'][$i][0] === $_SESSION['joueur'] &&
                $_SESSION['grille'][$i][1] === $_SESSION['joueur'] &&
                $_SESSION['grille'][$i][2] === $_SESSION['joueur']) {
                $_SESSION['message'] = $_SESSION['joueur'] . " a gagné !";
                $_SESSION['fin'] = true;
            }
        }

        // Vérifie les colonnes
        for ($i = 0; $i < 3; $i++) {
            if ($_SESSION['grille'][0][$i] === $_SESSION['joueur'] &&
                $_SESSION['grille'][1][$i] === $_SESSION['joueur'] &&
                $_SESSION['grille'][2][$i] === $_SESSION['joueur']) {
                $_SESSION['message'] = $_SESSION['joueur'] . " a gagné !";
                $_SESSION['fin'] = true;
            }
        }

        // Vérifie diagonales
        if ($_SESSION['grille'][0][0] === $_SESSION['joueur'] &&
            $_SESSION['grille'][1][1] === $_SESSION['joueur'] &&
            $_SESSION['grille'][2][2] === $_SESSION['joueur']) {
            $_SESSION['message'] = $_SESSION['joueur'] . " a gagné !";
            $_SESSION['fin'] = true;
        }

        if ($_SESSION['grille'][0][2] === $_SESSION['joueur'] &&
            $_SESSION['grille'][1][1] === $_SESSION['joueur'] &&
            $_SESSION['grille'][2][0] === $_SESSION['joueur']) {
            $_SESSION['message'] = $_SESSION['joueur'] . " a gagné !";
            $_SESSION['fin'] = true;
        }

        // Vérifie match nul (aucune case vide)
        $plein = true;
        for ($i = 0; $i < 3; $i++) {
            for ($j = 0; $j < 3; $j++) {
                if ($_SESSION['grille'][$i][$j] === '-') {
                    $plein = false;
                }
            }
        }

        if ($plein && $_SESSION['fin'] === false) {
            $_SESSION['message'] = "Match nul !";
            $_SESSION['fin'] = true;
        }

        // Change de joueur si la partie continue
        if ($_SESSION['fin'] === false) {
            if ($_SESSION['joueur'] === 'X') {
                $_SESSION['joueur'] = 'O';
            } else {
                $_SESSION['joueur'] = 'X';
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Morpion sans fonction</title>
    <style>
        table { border-collapse: collapse; margin: 20px auto; }
        td { width: 70px; height: 70px; text-align: center; border: 1px solid #000; }
        button { width: 100%; height: 100%; font-size: 24px; }
        .center { text-align: center; }
    </style>
</head>
<body>

<h2 class="center">Jeu du Morpion</h2>

<form method="POST" class="center">
    <table>
        <?php
        for ($i = 0; $i < 3; $i++) {
            echo "<tr>";
            for ($j = 0; $j < 3; $j++) {
                echo "<td>";
                if ($_SESSION['grille'][$i][$j] === '-' && $_SESSION['fin'] === false) {
                    echo '<button type="submit" name="cellule" value="' . $i . '-' . $j . '">-</button>';
                } else {
                    echo "<strong>" . $_SESSION['grille'][$i][$j] . "</strong>";
                }
                echo "</td>";
            }
            echo "</tr>";
        }
        ?>
    </table>

    <br>
    <input type="submit" name="reset" value="Réinitialiser la partie">
</form>

<?php
if ($_SESSION['message'] !== '') {
    echo "<p class='center'><strong>" . $_SESSION['message'] . "</strong></p>";
}
?>

</body>
</html>
