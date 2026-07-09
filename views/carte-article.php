<article class="article-card">
    <?php if (!empty($lienCategorie)): ?>
        <a href="index.php?route=categorie&id=<?= $article['categorieId'] ?>" class="badge">
            <?= e($article['categorieLibelle']) ?>
        </a>
    <?php else: ?>
        <span class="badge"><?= e($article['categorieLibelle']) ?></span>
    <?php endif; ?>

    <h2 class="article-card__title">
        <a href="index.php?route=article&id=<?= $article['id'] ?>"><?= e($article['titre']) ?></a>
    </h2>

    <p class="article-card__excerpt"><?= e(excerpt($article['contenu'])) ?></p>

    <div class="article-card__footer">
        <time class="article-card__date"><?= e(formatDate($article['dateCreation'])) ?></time>
        <a href="index.php?route=article&id=<?= $article['id'] ?>" class="article-card__link">Lire la suite →</a>
    </div>
</article>
