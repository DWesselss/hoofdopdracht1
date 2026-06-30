<?php
session_start();

$appNaam = 'ClutchTracker';
$basePath = '';
$melding = '';
$meldingType = '';

require_once 'includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';

    if ($username === '' || $password === '') {
        $melding = 'Vul een gebruikersnaam en wachtwoord in.';
        $meldingType = 'error';
    } else {
        $stmt = $conn->prepare('SELECT * FROM users WHERE username = ?');
        $stmt->execute([$username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            // Hoofdopdracht 15: de session geeft aan dat de gebruiker is ingelogd.
            $_SESSION['user'] = $user['username'];
            $_SESSION['user_id'] = $user['id'];

            $_SESSION['success'] = 'Succesvol ingelogd. Welkom ' . $user['username'] . '!';
            header('Location: index.php');
            exit;
        }

        $melding = 'Onjuiste gebruikersnaam of wachtwoord.';
        $meldingType = 'error';
    }
}

require_once 'includes/header.php';
?>
<main>
    <h1>Inloggen</h1>
    <p>Log in met je gebruikersnaam en wachtwoord.</p>

    <?php if ($melding !== ''): ?>
        <div class="<?= $meldingType === 'success' ? 'success-box' : 'error-box' ?>">
            <?= htmlspecialchars($melding) ?>
        </div>
    <?php endif; ?>

    <form method="POST" action="login.php">
        <label for="username">Gebruikersnaam:</label>
        <input
            type="text"
            name="username"
            id="username"
            value="<?= htmlspecialchars($_POST['username'] ?? '') ?>"
            required
        >

        <label for="password">Wachtwoord:</label>
        <input type="password" name="password" id="password" required>

        <button type="submit">Inloggen</button>
    </form>

    <p>Nog geen account? <a href="register.php">Registreer hier</a>.</p>
</main>
<?php require_once 'includes/footer.php'; ?>
