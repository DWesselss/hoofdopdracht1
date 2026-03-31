<?php
$appNaam = 'ClutchTracker';
$basePath = '../';

require_once '../includes/db.php';

$fouten = [];
$titel = '';
$genre = '';
$jaartal = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titel = trim($_POST['titel'] ?? '');
    $genre = trim($_POST['genre'] ?? '');
    $jaartal = trim($_POST['jaartal'] ?? '');

    if ($titel === '') {
        $fouten[] = 'Titel is verplicht.';
    } else {
        if (mb_strlen($titel) < 3) {
            $fouten[] = 'Titel moet minimaal 3 tekens bevatten.';
        }

        if (mb_strlen($titel) > 50) {
            $fouten[] = 'Titel mag maximaal 50 tekens bevatten.';
        }
    }

    if ($genre === '') {
        $fouten[] = 'Genre is verplicht.';
    } else {
        if (mb_strlen($genre) < 3) {
            $fouten[] = 'Genre moet minimaal 3 tekens bevatten.';
        }

        if (mb_strlen($genre) > 50) {
            $fouten[] = 'Genre mag maximaal 50 tekens bevatten.';
        }
    }

    if ($jaartal === '') {
        $fouten[] = 'Jaartal is verplicht.';
    } elseif (!is_numeric($jaartal)) {
        $fouten[] = 'Jaartal moet een numerieke waarde zijn.';
    }

    if (count($fouten) === 0) {
        $stmt = $conn->prepare('INSERT INTO games (titel, genre, jaartal) VALUES (:titel, :genre, :jaartal)');
        $stmt->execute([
            ':titel' => $titel,
            ':genre' => $genre,
            ':jaartal' => $jaartal
        ]);

        header('Location: ../index.php');
        exit;
    }
}

require_once '../includes/header.php';
?>
<main>
    <h1>Formulier verwerken</h1>

    <?php if ($_SERVER['REQUEST_METHOD'] !== 'POST'): ?>
        <p class="empty-message">Er is geen formulier verzonden.</p>
    <?php else: ?>
        <?php if (count($fouten) > 0): ?>
            <div class="error-box">
                <h2>Er zijn fouten gevonden:</h2>
                <ul>
                    <?php foreach ($fouten as $fout): ?>
                        <li><?= htmlspecialchars($fout) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <ul>
                <li><strong>Titel:</strong> <?= htmlspecialchars($titel) ?></li>
                <li><strong>Genre:</strong> <?= htmlspecialchars($genre) ?></li>
                <li><strong>Jaartal:</strong> <?= htmlspecialchars($jaartal) ?></li>
            </ul>
        <?php endif; ?>
    <?php endif; ?>

    <p><a href="toevoegen.php" class="back-link">Terug naar toevoegen</a></p>
    <p><a href="../index.php" class="back-link">Terug naar home</a></p>
</main>
<?php require_once '../includes/footer.php'; ?>