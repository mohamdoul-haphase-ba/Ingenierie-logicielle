<article class="article-detail">
    <a href="index.php?route=categorie&id=<?= $article['categorieId'] ?>" class="badge">
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
