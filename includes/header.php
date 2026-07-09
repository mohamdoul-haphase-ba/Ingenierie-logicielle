<?php
/**
 * V1 — Header commun
 * Les variables $pageTitle, $categorieActive et $categories
 * doivent être définies par chaque page AVANT l'inclusion.
 */
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= e($pageTitle ?? 'Canopée') ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,600;9..144,700&family=Source+Sans+3:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<header class="site-header">
    <div class="container header-inner">
        <a href="index.php" class="logo">
            <span class="logo-icon" aria-hidden="true">
                <svg width="28" height="28" viewBox="0 0 24 24" fill="none">
                    <path d="M12 3C8 8 4 10 4 14a8 8 0 0 0 16 0c0-4-4-6-8-11Z" fill="currentColor" opacity="0.2"/>
                    <path d="M12 3C8 8 4 10 4 14a8 8 0 0 0 16 0c0-4-4-6-8-11Z" stroke="currentColor" stroke-width="1.5" stroke-linejoin="round"/>
                    <path d="M12 13v8" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
                </svg>
            </span>
            <span class="logo-text">
                <span class="logo-name">Canopée</span>
                <span class="logo-tagline">L'actualité au naturel</span>
            </span>
        </a>

        <button class="nav-toggle" type="button" aria-label="Ouvrir le menu" aria-expanded="false">
            <span></span><span></span><span></span>
        </button>

        <nav class="nav" aria-label="Navigation principale">
            <a href="index.php" class="nav-link<?= ($categorieActive ?? null) === null ? ' is-active' : '' ?>">Accueil</a>
            <?php foreach ($categories as $cat): ?>
                <a href="categorie.php?id=<?= $cat['id'] ?>"
                   class="nav-link<?= ($categorieActive ?? null) == $cat['id'] ? ' is-active' : '' ?>">
                    <?= e($cat['libelle']) ?>
                </a>
            <?php endforeach; ?>
        </nav>
    </div>
</header>

<main class="container main-content">
