<?php
/**
 * V1 — Articles par catégorie (SANS MVC)
 * Connexion, validation, requêtes SQL et HTML dans le même fichier.
 */

require_once __DIR__ . '/config/db.php';
require_once __DIR__ . '/includes/functions.php';

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
if (!$id) {
    header('Location: index.php');
    exit;
}

$pdo = getConnection();

$categories = $pdo->query('SELECT * FROM Categorie')->fetchAll();

$stmt = $pdo->prepare('SELECT * FROM Categorie WHERE id = ?');
$stmt->execute([$id]);
$categorie = $stmt->fetch();

if (!$categorie) {
    header('Location: index.php');
    exit;
}

$sql = 'SELECT a.id, a.titre, a.contenu, a.dateCreation,
               c.id AS categorieId, c.libelle AS categorieLibelle
        FROM Article a
        INNER JOIN Categorie c ON a.categorie = c.id
        WHERE c.id = ?
        ORDER BY a.dateCreation DESC';
$stmt = $pdo->prepare($sql);
$stmt->execute([$id]);
$articles = $stmt->fetchAll();

$pageTitle       = 'Canopée — ' . $categorie['libelle'];
$categorieActive = $categorie['id'];

require_once __DIR__ . '/includes/header.php';
?>

<section class="page-header">
    <p class="page-eyebrow">Catégorie</p>
    <h1 class="page-title"><?= e($categorie['libelle']) ?></h1>
</section>

<?php if (empty($articles)): ?>
    <div class="empty-state">
        <p>Aucun article dans la catégorie « <?= e($categorie['libelle']) ?> » pour le moment.</p>
    </div>
<?php else: ?>
    <div class="articles-grid">
        <?php foreach ($articles as $article): ?>
            <article class="article-card">
                <span class="badge"><?= e($article['categorieLibelle']) ?></span>
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
