<?php
$appNaam = 'ClutchTracker';
$basePath = '../';
require_once '../includes/header.php';
?>
<main>
    <h1>Item succesvol ontvangen</h1>

    <?php if (isset($_POST['titel']) && isset($_POST['jaartal']) && isset($_POST['status'])): ?>
        <p><strong>Titel:</strong> <?= htmlspecialchars($_POST['titel']) ?></p>
        <p><strong>Jaartal:</strong> <?= htmlspecialchars($_POST['jaartal']) ?></p>
        <p><strong>Status:</strong> <?= htmlspecialchars($_POST['status']) ?></p>
    <?php else: ?>
        <p>Er is geen formulier verzonden.</p>
    <?php endif; ?>

    <p><a href="../index.php">Terug naar home</a></p>
    <p><a href="toevoegen.php">Nog een item toevoegen</a></p>
</main>
<?php require_once '../includes/footer.php'; ?>
