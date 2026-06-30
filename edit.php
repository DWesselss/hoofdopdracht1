<?php
session_start();

if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}

$appNaam = 'ClutchTracker';
$basePath = '';

require_once 'includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'] ?? '';
    $titel = trim($_POST['titel'] ?? '');
    $genre = trim($_POST['genre'] ?? '');
    $jaartal = trim($_POST['jaartal'] ?? '');

    if ($id === '' || !is_numeric($id)) {
        $_SESSION['error'] = 'Geen geldig ID meegegeven.';
        header('Location: index.php');
        exit;
    }

    if ($titel === '' || $genre === '' || $jaartal === '') {
        $_SESSION['error'] = 'Vul alle velden in.';
        header('Location: edit.php?id=' . urlencode((string) $id));
        exit;
    }

    if (!is_numeric($jaartal)) {
        $_SESSION['error'] = 'Jaartal moet een nummer zijn.';
        header('Location: edit.php?id=' . urlencode((string) $id));
        exit;
    }

    $stmt = $conn->prepare('UPDATE games SET titel = ?, genre = ?, jaartal = ? WHERE id = ?');
    $stmt->execute([$titel, $genre, $jaartal, $id]);

    $_SESSION['success'] = 'Item aangepast!';
    header('Location: index.php');
    exit;
}

$id = $_GET['id'] ?? '';

if ($id === '' || !is_numeric($id)) {
    $_SESSION['error'] = 'Geen geldig ID meegegeven.';
    header('Location: index.php');
    exit;
}

$stmt = $conn->prepare('SELECT * FROM games WHERE id = ?');
$stmt->execute([$id]);
$item = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$item) {
    $_SESSION['error'] = 'Item niet gevonden.';
    header('Location: index.php');
    exit;
}

require_once 'includes/header.php';
?>
<main>
    <h1>Item aanpassen</h1>
    <p>Hier wordt het item eerst opgehaald met het ID uit de URL. Daarna kun je het formulier opslaan met POST.</p>

    <?php if (isset($_SESSION['error'])): ?>
        <div class="error-box">
            <?= htmlspecialchars($_SESSION['error']) ?>
        </div>
        <?php unset($_SESSION['error']); ?>
    <?php endif; ?>

    <form method="POST" action="edit.php">
        <input type="hidden" name="id" value="<?= htmlspecialchars((string) $item['id']) ?>">

        <label for="titel">Titel:</label>
        <input type="text" name="titel" id="titel" required value="<?= htmlspecialchars($item['titel']) ?>">

        <label for="genre">Genre:</label>
        <input type="text" name="genre" id="genre" required value="<?= htmlspecialchars($item['genre']) ?>">

        <label for="jaartal">Jaartal:</label>
        <input type="number" name="jaartal" id="jaartal" required value="<?= htmlspecialchars((string) $item['jaartal']) ?>">

        <button type="submit">Opslaan</button>
    </form>

    <p><a href="index.php" class="back-link">Terug naar overzicht</a></p>
</main>
<?php require_once 'includes/footer.php'; ?>
