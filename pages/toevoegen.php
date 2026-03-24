<?php
$appNaam = 'ClutchTracker';
$basePath = '../';
require_once '../includes/header.php';
?>
<main>
    <h1>Nieuw item toevoegen</h1>

    <form method="POST" action="verwerk.php">
        <label for="titel">Titel:</label>
        <input type="text" name="titel" id="titel" required>

        <label for="jaartal">Jaartal:</label>
        <input type="number" name="jaartal" id="jaartal">

        <label for="status">Status:</label>
        <input type="text" name="status" id="status">

        <button type="submit">Verzenden</button>
    </form>
</main>
<?php require_once '../includes/footer.php'; ?>
