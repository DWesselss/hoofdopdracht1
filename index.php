<?php
$appNaam = 'ClutchTracker';
$trackerType = 'Game Score Tracker';
$tagline = 'Track je games, status en jaartallen op één plek.';

require_once 'includes/db.php';

$stmt = $conn->prepare('SELECT titel, jaartal, status FROM items ORDER BY ID ASC');
$stmt->execute();
$items = $stmt->fetchAll(PDO::FETCH_ASSOC);

require_once 'includes/header.php';
?>
<main>
    <h1><span id="greeting">Hoi</span>, welkom bij <?= htmlspecialchars($appNaam) ?></h1>
    <h2>Dit is mijn <?= htmlspecialchars($trackerType) ?></h2>
    <p><?= htmlspecialchars($tagline) ?></p>

    <h2>Overzicht van items</h2>

    <?php if (count($items) > 0): ?>
        <ul>
            <?php foreach ($items as $item): ?>
                <li>
                    <strong><?= htmlspecialchars($item['titel']) ?></strong>
                    (<?= htmlspecialchars((string) $item['jaartal']) ?>) -
                    <?= htmlspecialchars($item['status']) ?>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p class="empty-message">Er zijn nog geen items toegevoegd.</p>
    <?php endif; ?>
</main>
<?php require_once 'includes/footer.php'; ?>
