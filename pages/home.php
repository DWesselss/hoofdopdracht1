<?php

$appNaam = "ClutchTracker";
$trackerType = "Game Score Tracker";
$tagline = "Track your games";

?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title><?= $appNaam ?></title>
</head>
<body>

    <h1><span id="greeting">Hoi</span>, welkom bij <?= $appNaam ?></h1>

    <h2>Dit is mijn <?= $trackerType ?></h2>
    <p><?= $tagline ?></p>

    <footer>
        <hr>
        <p>&copy; <?= date("Y") ?> <?= $appNaam ?></p>
    </footer>

    <script src="app.js"></script>
</body>
</html>