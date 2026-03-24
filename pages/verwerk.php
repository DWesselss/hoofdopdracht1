<?php
$appNaam = 'ClutchTracker';
$basePath = '../';
require_once '../includes/db.php';
require_once '../includes/header.php';
?>
<main>
    <h1>Item succesvol ontvangen</h1>

    <?php if (isset($_POST['titel'])): ?>
        <?php
        $titel = trim($_POST['titel'] ?? '');
        $genre = trim($_POST['genre'] ?? '');
        $jaartal = trim($_POST['jaartal'] ?? '');

        if ($titel !== '') {
            $stmt = $conn->prepare('INSERT INTO games (titel, genre, jaartal) VALUES (:titel, :genre, :jaartal)');
            $stmt->execute([
                ':titel' => $titel,
                ':genre' => $genre,
                ':jaartal' => $jaartal !== '' ? (int) $jaartal : null,
            ]);
        }
        ?>

        <div class="success-box">
            <p>Het item is opgeslagen in de database.</p>
        </div>

        <ul>
            <li><strong>Titel:</strong> <?= htmlspecialchars($titel) ?></li>
            <li><strong>Genre:</strong> <?= htmlspecialchars($genre) ?></li>
            <li><strong>Jaartal:</strong> <?= htmlspecialchars($jaartal) ?></li>
        </ul>
    <?php else: ?>
        <p>Er is geen formulier verzonden.</p>
    <?php endif; ?>

    <p><a href="../index.php" class="back-link">Terug naar home</a></p>
    <p><a href="toevoegen.php" class="back-link">Nog een item toevoegen</a></p>
</main>
<?php require_once '../includes/footer.php'; ?>
