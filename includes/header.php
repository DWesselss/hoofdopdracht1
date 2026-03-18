<?php
if (!isset($appNaam)) {
    $appNaam = 'ClutchTracker';
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

        .empty-message {
            padding: 12px 16px;
            border-radius: 10px;
            background: #eef2ff;
        }
    </style>
</head>
<body>
