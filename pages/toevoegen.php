<?php
session_start();

$appNaam = 'ClutchTracker';
$basePath = '../';

$old = $_SESSION['old'] ?? [
    'titel' => '',
    'genre' => '',
    'jaartal' => ''
];

require_once '../includes/header.php';
?>
<main>
    <h1>Nieuw item toevoegen</h1>
    <p>Vul hieronder een nieuw game-item in.</p>

    <?php if (isset($_SESSION['error'])): ?>
        <div class="error-box">
            <?= htmlspecialchars($_SESSION['error']) ?>
        </div>
        <?php unset($_SESSION['error']); ?>
    <?php endif; ?>

    <form method="POST" action="verwerk.php">
        <label for="titel">Titel:</label>
        <input type="text" name="titel" id="titel" required value="<?= htmlspecialchars($old['titel']) ?>">

        <label for="genre">Genre:</label>
        <input type="text" name="genre" id="genre" required value="<?= htmlspecialchars($old['genre']) ?>">

        <label for="jaartal">Jaartal:</label>
        <input type="number" name="jaartal" id="jaartal" required value="<?= htmlspecialchars((string) $old['jaartal']) ?>">

        <button type="submit">Verzenden</button>
    </form>
</main>
<?php
unset($_SESSION['old']);
require_once '../includes/footer.php';
?>
