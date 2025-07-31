<?php
// Dossier de base (le dossier où se trouve ce script)
$baseDir = realpath(__DIR__);

// Obtenir le chemin demandé par l'utilisateur
$relativePath = $_GET['path'] ?? '';
$fullPath = realpath($baseDir . DIRECTORY_SEPARATOR . $relativePath);

// Vérifier que le chemin est bien dans le dossier autorisé (sécurité)
if ($fullPath === false || strpos($fullPath, $baseDir) !== 0) {
    die("Accès non autorisé");
}
var_dump($_SERVER['REMOTE_ADDR']);
if ($_SERVER['REMOTE_ADDR'] != "94.231.43.157" && $_SERVER['REMOTE_ADDR'] != '::1')
{
    die("Accès non autorisé");
}

// Lire les éléments du dossier
$items = scandir($fullPath);
$items = array_diff($items, ['.', '..']);

// Générer le lien vers le dossier parent
$parentPath = dirname($relativePath);
$backLink = $relativePath ? '<li><a href="?path=' . urlencode($parentPath) . '">⬅️ Retour</a></li>' : '';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Explorateur de fichiers</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; }
        ul { list-style: none; padding-left: 0; }
        li { margin: 5px 0; }
        a { text-decoration: none; color: #2c3e50; }
        a:hover { text-decoration: underline; }
        .folder::before { content: "📁 "; }
        .file::before { content: "📄 "; }
    </style>
</head>
<body>
    <h1>Contenu de : <?= htmlspecialchars($relativePath ?: '.') ?></h1>
    <ul>
        <?= $backLink ?>
        <?php foreach ($items as $item):
            $itemRelPath = ltrim($relativePath . '/' . $item, '/');
            $itemFullPath = $fullPath . DIRECTORY_SEPARATOR . $item;
            if (is_dir($itemFullPath)): ?>
                <li class="folder">
                    <a href="?path=<?= urlencode($itemRelPath) ?>">
                        <?= htmlspecialchars($item) ?>
                    </a>
                </li>
            <?php else: ?>
                <li class="file">
                    <a href="<?= htmlspecialchars($itemRelPath) ?>" target="_blank">
                        <?= htmlspecialchars($item) ?>
                    </a>
                </li>
            <?php endif;
        endforeach; ?>
    </ul>
</body>
</html>
