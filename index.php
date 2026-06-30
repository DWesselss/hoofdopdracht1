<?php
session_start();

$appNaam = 'ClutchTracker';
$trackerType = 'Game Tracker';
$tagline = 'Track je games, genre en jaartal op één plek.';
$basePath = '';

require_once 'includes/db.php';

$stmt = $conn->prepare('SELECT id, titel, genre, jaartal FROM games ORDER BY id ASC');
$stmt->execute();
$items = $stmt->fetchAll(PDO::FETCH_ASSOC);

require_once 'includes/header.php';
?>
<main>
    <h1><span id="greeting">Hoi</span>, welkom bij <?= htmlspecialchars($appNaam) ?></h1>
    <h2>Dit is mijn <?= htmlspecialchars($trackerType) ?></h2>
    <p><?= htmlspecialchars($tagline) ?></p>

    <?php if (isset($_SESSION['success'])): ?>
        <div class="success-box">
            <?= htmlspecialchars($_SESSION['success']) ?>
        </div>
        <?php unset($_SESSION['success']); ?>
    <?php endif; ?>

    <?php if (isset($_SESSION['error'])): ?>
        <div class="error-box">
            <?= htmlspecialchars($_SESSION['error']) ?>
        </div>
        <?php unset($_SESSION['error']); ?>
    <?php endif; ?>

    <p>
        <?php if (isset($_SESSION['user'])): ?>
            <a href="pages/toevoegen.php" class="back-link">Nieuw item toevoegen</a>
            <span class="link-divider">|</span>
            <a href="logout.php" class="back-link">Uitloggen</a>
        <?php else: ?>
            <a href="register.php" class="back-link">Registreren</a>
            <span class="link-divider">|</span>
            <a href="login.php" class="back-link">Inloggen om items te beheren</a>
        <?php endif; ?>
    </p>

    <h2>Overzicht van items</h2>

    <?php if (count($items) > 0): ?>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Titel</th>
                    <th>Genre</th>
                    <th>Jaartal</th>
                    <th>Acties</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($items as $item): ?>
                    <tr>
                        <td><?= htmlspecialchars((string) $item['id']) ?></td>
                        <td><strong><?= htmlspecialchars($item['titel']) ?></strong></td>
                        <td><?= htmlspecialchars($item['genre']) ?></td>
                        <td><?= htmlspecialchars((string) $item['jaartal']) ?></td>
                        <td>
                            <?php if (isset($_SESSION['user'])): ?>
                                <a href="edit.php?id=<?= htmlspecialchars((string) $item['id']) ?>">Aanpassen</a>
                                <span class="link-divider">|</span>
                                <a href="delete.php?id=<?= htmlspecialchars((string) $item['id']) ?>" onclick="return confirm('Weet je zeker dat je dit item wilt verwijderen?');">Verwijderen</a>
                            <?php else: ?>
                                <a href="login.php">Log in om te beheren</a>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="empty-message">Er zijn nog geen items toegevoegd.</p>
    <?php endif; ?>
</main>
<?php require_once 'includes/footer.php'; ?>
