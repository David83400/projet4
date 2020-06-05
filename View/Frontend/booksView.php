<?php $this->title = 'Jean Forteroche | Les romans' ?>

<section id="booksList">
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4">      
    <?php foreach ($books as $book): ?>
        <div class="col mb-4">
            <div class="card h-100">
                <img src="<?= htmlspecialchars($book['bookImage']) ?>" class="card-img-top" alt="Livre de Jean Forteroche">
                <div class="card-body">
                    <h4 class="card-title"><?= htmlspecialchars($book['title']) ?></h4>
                    <p class="card-text"><?= htmlspecialchars(substr($book['content'], 0, 100)) ?> ... <a href="<?= 'index.php?action=book&id=' . htmlspecialchars($book['id']) ?>">découvrir</a></p>
                    <p class="card-text"><small class="text-muted">Publié par <?= htmlspecialchars($book['author']) ?> le <?= htmlspecialchars($book['parutionFrDate']) ?></small></p>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    </div>
</section>