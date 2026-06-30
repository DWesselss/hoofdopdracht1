<?php
session_start();

// Verwijder alle sessiongegevens en log de gebruiker uit.
$_SESSION = [];
session_destroy();

header('Location: login.php');
exit;
