<?php
session_start();

// Initialiser la grille et le joueur si ce n'est pas encore fait
if (!isset($_SESSION['grille'])) {
    $_SESSION['grille'] = array_fill(0, 3, array_fill(0, 3, '-'));
    $_SESSION['joueur'] = 'X';
}

// Réinitialiser la partie si bouton cliqué ou partie terminée
if (isset($_POST['reset']) || isset($_SESSION['fin'])) {
    $_SESSION['grille'] = array_fill(0, 3, array_fill(0, 3, '-'));
    $_SESSION['joueur'] = 'X';
    unset($_SESSION['fin']);
}

// Gérer le clic sur une case
if (isset($_POST['cell']) && !isset($_SESSION['fin'])) {
    $cell = explode('-', $_POST['cell']);
    $row = $cell[0];
    $col = $cell[1];

    // Si la case est vide
    if ($_SESSION['grille'][$row][$col] === '-') {
        $_SESSION['grille'][$row][$col] = $_SESSION['joueur'];

        // Vérifier s'il y a un gagnant ou match nul
        if (verifierGagnant($_SESSION['grille'], $_SESSION['joueur'])) {
            $_SESSION['message'] = $_SESSION['joueur'] . " a gagné !";
            $_SESSION['fin'] = true;
        } elseif (grillePleine($_SESSION['grille'])) {
            $_SESSION['message'] = "Match nul !";
            $_SESSION['fin'] = true;
        } else {
            // Changer de joueur
            $_SESSION['joueur'] = ($_SESSION['joueur'] === 'X') ? 'O' : 'X';
        }
    }
}

// Fonction pour vérifier le gagnant
function verifierGagnant($grille, $joueur) {
    // Lignes, colonnes, diagonales
    for ($i = 0; $i < 3; $i++) {
        if ($grille[$i][0] === $joueur && $grille[$i][1] === $joueur && $grille[$i][2] === $joueur) return true;
        if ($grille[0][$i] === $joueur && $grille[1][$i] === $joueur && $grille[2][$i] === $joueur) return true;
    }
    if ($grille[0][0] === $joueur && $grille[1][1] === $joueur && $grille[2][2] === $joueur) return true;
    if ($grille[0][2] === $joueur && $grille[1][1] === $joueur && $grille[2][0] === $joueur) return true;

    return false;
}

// Fonction pour vérifier si toutes les cases sont remplies
function grillePleine($grille) {
    foreach ($grille as $ligne) {
        if (in_array('-', $ligne)) return false;
    }
    return true;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Jeu du Morpion</title>
    <style>
        table { border-collapse: collapse; margin: 20px auto; }
        td { width: 60px; height: 60px; text-align: center; border: 1px solid black; }
        input[type=submit] { width: 100%; height: 100%; font-size: 24px; }
    </style>
</head>
<body>

<h2 style="text-align: center;">Jeu du Morpion</h2>

<form method="POST">
    <table>
        <?php for ($i = 0; $i < 3; $i++) { ?>
            <tr>
                <?php for ($j = 0; $j < 3; $j++) { ?>
                    <td>
                        <?php if ($_SESSION['grille'][$i][$j] === '-' && !isset($_SESSION['fin'])) { ?>
                            <button type="submit" name="cell" value="<?= $i . '-' . $j ?>">-</button>
                        <?php } else {
                            echo "<strong>" . $_SESSION['grille'][$i][$j] . "</strong>";
                        } ?>
                    </td>
                <?php } ?>
            </tr>
        <?php } ?>
    </table>

    <div style="text-align: center;">
        <input type="submit" name="reset" value="Réinitialiser la partie">
    </div>
</form>

<?php if (isset($_SESSION['message'])) { ?>
    <p style="text-align: center; font-weight: bold;">
        <?= $_SESSION['message'] ?>
    </p>
<?php } ?>

</body>
</html>
