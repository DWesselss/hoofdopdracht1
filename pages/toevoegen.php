<?php
$appNaam = 'ClutchTracker';
$basePath = '../';
require_once '../includes/header.php';
?>
<main>
    <h1>Nieuw item toevoegen</h1>
    <p>Vul hieronder een nieuw game-item in.</p>

    <form method="POST" action="verwerk.php">
        <label for="titel">Titel:</label>
        <input type="text" name="titel" id="titel" required>

        <label for="genre">Genre:</label>
        <input type="text" name="genre" id="genre">

        <label for="jaartal">Jaartal:</label>
        <input type="number" name="jaartal" id="jaartal">

        <button type="submit">Verzenden</button>
    </form>
</main>
<?php require_once '../includes/footer.php'; ?>
