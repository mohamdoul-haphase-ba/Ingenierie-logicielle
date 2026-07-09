<section class="page-header">
    <p class="page-eyebrow">Catégorie</p>
    <h1 class="page-title"><?= e($categorie['libelle']) ?></h1>
</section>

<?php if (empty($articles)): ?>
    <div class="empty-state">
        <p>Aucun article dans « <?= e($categorie['libelle']) ?> ».</p>
    </div>
<?php else: ?>
    <div class="articles-grid">
        <?php foreach ($articles as $article): ?>
            <?php $lienCategorie = false; require 'views/carte-article.php'; ?>
        <?php endforeach; ?>
    </div>
<?php endif; ?>
