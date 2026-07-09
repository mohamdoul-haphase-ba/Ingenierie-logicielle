<?php
/**
 * V1 — Détail d'un article (SANS MVC)
 * Connexion, validation, requête SQL et HTML dans le même fichier.
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

$sql = 'SELECT a.id, a.titre, a.contenu, a.dateCreation, a.dateModification,
               c.id AS categorieId, c.libelle AS categorieLibelle
        FROM Article a
        INNER JOIN Categorie c ON a.categorie = c.id
        WHERE a.id = ?';
$stmt = $pdo->prepare($sql);
$stmt->execute([$id]);
$article = $stmt->fetch();

if (!$article) {
    header('Location: index.php');
    exit;
}

$pageTitle       = 'Canopée — ' . $article['titre'];
$categorieActive = $article['categorieId'];

require_once __DIR__ . '/includes/header.php';
?>

<article class="article-detail">
    <a href="categorie.php?id=<?= $article['categorieId'] ?>" class="badge">
        <?= e($article['categorieLibelle']) ?>
    </a>

    <h1 class="article-detail__title"><?= e($article['titre']) ?></h1>

    <p class="article-detail__meta">
        Publié le <?= e(formatDate($article['dateCreation'])) ?>
        <?php if ($article['dateModification'] !== $article['dateCreation']): ?>
            — Modifié le <?= e(formatDate($article['dateModification'])) ?>
        <?php endif; ?>
    </p>

    <div class="article-detail__content">
        <?= nl2br(e($article['contenu'])) ?>
    </div>

    <a href="index.php" class="back-link">← Retour à l'accueil</a>
</article>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
