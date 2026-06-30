<?php
if (!isset($appNaam)) {
    $appNaam = 'ClutchTracker';
}

if (!isset($basePath)) {
    $basePath = '';
}
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($appNaam) ?></title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 900px;
            margin: 0 auto;
            padding: 32px 20px;
            line-height: 1.5;
            background: #f6f7fb;
            color: #1f2937;
        }

        nav {
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 16px;
            flex-wrap: wrap;
        }

        .nav-user {
            margin-left: auto;
            font-weight: 600;
        }

        nav a,
        .back-link,
        table a {
            color: #1d4ed8;
            text-decoration: none;
            font-weight: 600;
        }

        nav a:hover,
        .back-link:hover,
        table a:hover {
            text-decoration: underline;
        }

        main {
            background: #ffffff;
            border-radius: 16px;
            padding: 24px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
        }

        h1, h2 {
            margin-top: 0;
        }

        ul {
            padding-left: 20px;
        }

        li {
            margin-bottom: 8px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 16px;
        }

        th,
        td {
            text-align: left;
            padding: 10px;
            border-bottom: 1px solid #e5e7eb;
        }

        th {
            background: #eef2ff;
        }

        footer {
            margin-top: 24px;
            padding-top: 16px;
            border-top: 1px solid #d1d5db;
        }

        .empty-message,
        .success-box,
        .error-box {
            padding: 12px 16px;
            border-radius: 10px;
            margin-bottom: 16px;
        }

        .empty-message,
        .success-box {
            background: #eef2ff;
        }

        .error-box {
            background: #fee2e2;
        }

        .link-divider {
            color: #94a3b8;
            margin: 0 6px;
        }

        label {
            display: block;
            font-weight: 600;
            margin-bottom: 6px;
        }

        input {
            width: 100%;
            max-width: 420px;
            padding: 10px 12px;
            border: 1px solid #cbd5e1;
            border-radius: 10px;
            margin-bottom: 16px;
            box-sizing: border-box;
        }

        button {
            padding: 10px 16px;
            border: 0;
            border-radius: 10px;
            background: #1d4ed8;
            color: white;
            cursor: pointer;
            font-weight: 600;
        }

        button:hover {
            background: #1e40af;
        }
    </style>
</head>
<body>
<nav>
    <a href="<?= htmlspecialchars($basePath) ?>index.php">Home</a>

    <?php if (isset($_SESSION['user'])): ?>
        <a href="<?= htmlspecialchars($basePath) ?>pages/toevoegen.php">Toevoegen</a>
        <a href="<?= htmlspecialchars($basePath) ?>logout.php">Uitloggen</a>
        <span class="nav-user">Ingelogd als <?= htmlspecialchars($_SESSION['user']) ?></span>
    <?php else: ?>
        <a href="<?= htmlspecialchars($basePath) ?>register.php">Registreren</a>
        <a href="<?= htmlspecialchars($basePath) ?>login.php">Inloggen</a>
    <?php endif; ?>
</nav>
