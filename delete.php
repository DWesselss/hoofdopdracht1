<?php
session_start();

if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}

require_once 'includes/db.php';

$id = $_GET['id'] ?? '';

if ($id === '' || !is_numeric($id)) {
    $_SESSION['error'] = 'Geen geldig ID meegegeven.';
    header('Location: index.php');
    exit;
}

$stmt = $conn->prepare('DELETE FROM games WHERE id = ?');
$stmt->execute([$id]);

$_SESSION['success'] = 'Item verwijderd!';
header('Location: index.php');
exit;
