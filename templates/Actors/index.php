<h1>Actors and Movies</h1>

<input type="text" id="searchInput" placeholder="Search actors..." />

<ul id="actorList">
    <?php foreach ($actors as $actor): ?>
        <li class="actor-item">
            <strong class="actor-name"><?= h($actor->name) ?></strong>
            <ul>
                <?php foreach ($actor->movies as $movie): ?>
                    <li><?= h($movie->name) ?></li>
                <?php endforeach; ?>
            </ul>
        </li>
    <?php endforeach; ?>
</ul>

<p id="noMatch" style="display:none;">No match found.</p>

<?= $this->Html->script('actor_search') ?>