<h1>Search Movie Stars</h1>

<section class="tmdb-search-form">
    <?= $this->Form->create(null, ['type' => 'get']) ?>
    <?= $this->Form->control('query', [
        'label' => 'Search name',
        'value' => $this->request->getQuery('query'),
        'class' => 'tmdb-input'
    ]) ?>
    <?= $this->Form->button('Search', ['class' => 'tmdb-button']) ?>
    <?= $this->Form->end() ?>
</section>

<?php if (isset($results)): ?>
    <section class="tmdb-results">
        <h2>Results</h2>

        <?php if (empty($results)): ?>
            <p class="no-results">No people found.</p>
        <?php else: ?>
            <ul class="results-list">
                <?php foreach ($results as $person): ?>
                    <li class="result-item">
                        <div class="person-name"><?= h($person['name']) ?></div>

                        <?php if (!empty($person['known_for'])): ?>
                            <div class="known-for">
                                <span class="known-for-label">Known for:</span>
                                <ul class="known-for-list">
                                    <?php foreach ($person['known_for'] as $work): ?>
                                        <li>
                                            <strong><?= h($work['title'] ?? $work['name'] ?? 'Unknown') ?></strong><br>
                                            <span>Media Type:</span> <?= h($work['media_type'] ?? 'NA') ?><br>
                                            Release Date: <?= h($work['release_date'] ?? 'NA') ?><br>

                                            <?php if (!empty($work['backdrop_path'])): ?>
                                                <img src="<?= env('TMDB_IMAGE_BASE_URL') . h($work['backdrop_path']) ?>"
                                                    alt="<?= h($work['title'] ?? $work['name'] ?? 'Work Image') ?>" class="tmdb-image" />
                                            <?php else: ?>
                                                <small>(No image available)</small>
                                            <?php endif; ?>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        <?php endif; ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </section>
<?php endif; ?>

<?php
$current = $pagination['page'];
$total = $pagination['total_pages'];
$queryEncoded = h($this->request->getQuery('query'));
$range = 2;
$start = max(1, $current - $range);
$end = min($total, $current + $range);
?>

<?php if ($total > 1): ?>
    <nav class="pagination">
        <ul>
            <!-- First and Prev -->
            <?php if ($current > 1): ?>
                <li><a href="?query=<?= $queryEncoded ?>&page=1">First</a></li>
                <li><a href="?query=<?= $queryEncoded ?>&page=<?= $current - 1 ?>">Prev</a></li>
            <?php endif; ?>

            <!-- Left Ellipsis -->
            <?php if ($start > 2): ?>
                <li>...</li>
            <?php endif; ?>

            <!-- Page Range -->
            <?php for ($i = $start; $i <= $end; $i++): ?>
                <li>
                    <?php if ($i === $current): ?>
                        <strong><?= $i ?></strong>
                    <?php else: ?>
                        <a href="?query=<?= $queryEncoded ?>&page=<?= $i ?>"><?= $i ?></a>
                    <?php endif; ?>
                </li>
            <?php endfor; ?>

            <!-- Right Ellipsis -->
            <?php if ($end < $total - 1): ?>
                <li>...</li>
            <?php endif; ?>

            <!-- Next and Last -->
            <?php if ($current < $total): ?>
                <li><a href="?query=<?= $queryEncoded ?>&page=<?= $current + 1 ?>">Next</a></li>
                <li><a href="?query=<?= $queryEncoded ?>&page=<?= $total ?>">Last</a></li>
            <?php endif; ?>
        </ul>
    </nav>
<?php endif; ?>