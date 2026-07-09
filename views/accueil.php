<section class="page-header">
    <p class="page-eyebrow">Dernières actualités</p>
    <h1 class="page-title">À la une</h1>
</section>

<?php if (empty($articles)): ?>
    <div class="empty-state"><p>Aucun article pour le moment.</p></div>
<?php else: ?>
    <div class="articles-grid">
        <?php foreach ($articles as $article): ?>
            <?php $lienCategorie = true; require 'views/carte-article.php'; ?>
        <?php endforeach; ?>
    </div>
<?php endif; ?>
