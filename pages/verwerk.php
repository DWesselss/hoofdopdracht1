<?php
session_start();

$appNaam = 'ClutchTracker';
$basePath = '../';

require_once '../includes/db.php';

$fouten = [];
$titel = trim($_POST['titel'] ?? '');
$genre = trim($_POST['genre'] ?? '');
$jaartal = trim($_POST['jaartal'] ?? '');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: toevoegen.php');
    exit;
}

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

$_SESSION['old'] = [
    'titel' => $titel,
    'genre' => $genre,
    'jaartal' => $jaartal
];

if (count($fouten) > 0) {
    $_SESSION['error'] = implode(' ', $fouten);
    header('Location: toevoegen.php');
    exit;
}

$stmt = $conn->prepare('INSERT INTO games (titel, genre, jaartal) VALUES (:titel, :genre, :jaartal)');
$gelukt = $stmt->execute([
    ':titel' => $titel,
    ':genre' => $genre,
    ':jaartal' => $jaartal
]);

if ($gelukt) {
    unset($_SESSION['old']);
    $_SESSION['success'] = 'Item toegevoegd!';
    header('Location: ../index.php');
    exit;
}

$_SESSION['error'] = 'Opslaan is mislukt.';
header('Location: toevoegen.php');
exit;
