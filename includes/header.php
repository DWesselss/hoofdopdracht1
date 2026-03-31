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
            gap: 16px;
            flex-wrap: wrap;
        }

        nav a,
        .back-link {
            color: #1d4ed8;
            text-decoration: none;
            font-weight: 600;
        }

        nav a:hover,
        .back-link:hover {
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
    <a href="<?= htmlspecialchars($basePath) ?>pages/toevoegen.php">Toevoegen</a>
</nav>
