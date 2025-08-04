<?php
// Démarre la session pour stocker l'état du jeu
session_start();

// Initialisation ou réinitialisation de la partie
if (!isset($_SESSION['grille']) || isset($_POST['reset'])) {
    // Crée une grille vide 3x3 avec des cases "-"
    $_SESSION['grille'] = [
        ['-', '-', '-'],
        ['-', '-', '-'],
        ['-', '-', '-']
    ];
    // Le joueur qui commence est X
    $_SESSION['joueur'] = 'X';
    // Aucun message au début  
    $_SESSION['message'] = '';
    // La partie est active  
    $_SESSION['fin'] = false;
}

// Si une case est cliquée et que la partie n'est pas terminée
if (isset($_POST['cellule']) && !$_SESSION['fin']) {
    // Sépare la chaîne "ligne-colonne" reçue (ex: "1-2")
    [$i, $j] = explode('-', $_POST['cellule']);

    // Vérifie que la case est encore vide
    if ($_SESSION['grille'][$i][$j] === '-') {
        // Récupère le joueur actuel
        $joueur = $_SESSION['joueur'];
        // Place le symbole dans la grille
        $_SESSION['grille'][$i][$j] = $joueur;

        $gagne = false;
        $g = $_SESSION['grille'];

        // Vérifie toutes les lignes et colonnes
        for ($n = 0; $n < 3; $n++) {
            if ($g[$n][0] === $joueur && $g[$n][1] === $joueur && $g[$n][2] === $joueur)
                $gagne = true;
            if ($g[0][$n] === $joueur && $g[1][$n] === $joueur && $g[2][$n] === $joueur)
                $gagne = true;
        }

        // Vérifie les deux diagonales
        if (
            ($g[0][0] === $joueur && $g[1][1] === $joueur && $g[2][2] === $joueur) ||
            ($g[0][2] === $joueur && $g[1][1] === $joueur && $g[2][0] === $joueur)
        ) {
            $gagne = true;
        }

        // Si victoire détectée
        if ($gagne) {
            $_SESSION['message'] = "$joueur a gagné !";
            // Bloque la suite de la partie
            $_SESSION['fin'] = true; 
        }
        // Sinon si toutes les cases sont remplies et pas de gagnant
        elseif (!in_array('-', array_merge(...$g))) {
            $_SESSION['message'] = "Match nul !";
            $_SESSION['fin'] = true;
        }
        // Sinon, on passe au joueur suivant
        else {
            $_SESSION['joueur'] = $joueur === 'X' ? 'O' : 'X';
        }
    }
}
?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Morpion simplifié</title>
    <style>
        table {
            border-collapse: collapse;
            margin: 20px auto;
        }

        td {
            width: 70px;
            height: 70px;
            text-align: center;
            border: 1px solid #000;
        }

        button {
            width: 100%;
            height: 100%;
            font-size: 24px;
        }

        .center {
            text-align: center;
        }
    </style>
</head>

<body>

    <h2 class="center">Jeu du Morpion</h2>

    <form method="post" class="center">
        <table>
            <?php foreach ($_SESSION['grille'] as $i => $ligne): ?>
                <tr>
                    <?php foreach ($ligne as $j => $val): ?>
                        <td>
                            <?php if ($val === '-' && !$_SESSION['fin']): ?>
                                <button type="submit" name="cellule" value="<?= "$i-$j" ?>">-</button>
                            <?php else: ?>
                                <strong><?= $val ?></strong>
                            <?php endif; ?>
                        </td>
                    <?php endforeach; ?>
                </tr>
            <?php endforeach; ?>
        </table>

        <br>
        <input type="submit" name="reset" value="Réinitialiser la partie">
    </form>

    <?php if ($_SESSION['message']): ?>
        <p class="center"><strong><?= $_SESSION['message'] ?></strong></p>
    <?php endif; ?>

</body>

</html>
