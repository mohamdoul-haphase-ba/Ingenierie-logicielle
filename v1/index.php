<?php
/**
 * V1 — Page d'accueil (SANS MVC)
 * Tout est dans ce fichier : connexion BDD, requêtes SQL, affichage HTML.
 */

require_once __DIR__ . '/config/db.php';
require_once __DIR__ . '/includes/functions.php';

$pdo = getConnection();

// Requête pour le menu
$categories = $pdo->query('SELECT * FROM Categorie')->fetchAll();

// Requête pour les articles (avec jointure catégorie)
$sql = 'SELECT a.id, a.titre, a.contenu, a.dateCreation,
               c.id AS categorieId, c.libelle AS categorieLibelle
        FROM Article a
        INNER JOIN Categorie c ON a.categorie = c.id
        ORDER BY a.dateCreation DESC';
$articles = $pdo->query($sql)->fetchAll();

$pageTitle       = 'Canopée — Accueil';
$categorieActive = null;

require_once __DIR__ . '/includes/header.php';
?>

<section class="page-header">
    <p class="page-eyebrow">Dernières actualités</p>
    <h1 class="page-title">À la une</h1>
</section>

<?php if (empty($articles)): ?>
    <div class="empty-state">
        <p>Aucun article disponible pour le moment.</p>
    </div>
<?php else: ?>
    <div class="articles-grid">
        <?php foreach ($articles as $article): ?>
            <article class="article-card">
                <a href="categorie.php?id=<?= $article['categorieId'] ?>" class="badge">
                    <?= e($article['categorieLibelle']) ?>
                </a>
                <h2 class="article-card__title">
                    <a href="article.php?id=<?= $article['id'] ?>"><?= e($article['titre']) ?></a>
                </h2>
                <p class="article-card__excerpt"><?= e(excerpt($article['contenu'])) ?></p>
                <div class="article-card__footer">
                    <time class="article-card__date"><?= e(formatDate($article['dateCreation'])) ?></time>
                    <a href="article.php?id=<?= $article['id'] ?>" class="article-card__link">
                        Lire la suite →
                    </a>
                </div>
            </article>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
