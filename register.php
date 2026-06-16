<?php
session_start();

$appNaam = 'ClutchTracker';
$basePath = '';

require_once 'includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';

    if ($username === '' || $password === '') {
        $_SESSION['error'] = 'Vul een gebruikersnaam en wachtwoord in.';
        header('Location: register.php');
        exit;
    }

    if (mb_strlen($username) < 3) {
        $_SESSION['error'] = 'Gebruikersnaam moet minimaal 3 tekens zijn.';
        header('Location: register.php');
        exit;
    }

    if (mb_strlen($password) < 6) {
        $_SESSION['error'] = 'Wachtwoord moet minimaal 6 tekens zijn.';
        header('Location: register.php');
        exit;
    }

    $checkStmt = $conn->prepare('SELECT id FROM users WHERE username = ?');
    $checkStmt->execute([$username]);

    if ($checkStmt->fetch()) {
        $_SESSION['error'] = 'Deze gebruikersnaam bestaat al.';
        header('Location: register.php');
        exit;
    }

    $hash = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $conn->prepare('INSERT INTO users (username, password) VALUES (?, ?)');
    $stmt->execute([$username, $hash]);

    $_SESSION['success'] = 'Gebruiker geregistreerd! Het wachtwoord is veilig opgeslagen als hash.';
    header('Location: index.php');
    exit;
}

require_once 'includes/header.php';
?>
<main>
    <h1>Registreren</h1>
    <p>Maak een nieuwe gebruiker aan. Het wachtwoord wordt opgeslagen met <code>password_hash()</code>.</p>

    <?php if (isset($_SESSION['error'])): ?>
        <div class="error-box">
            <?= htmlspecialchars($_SESSION['error']) ?>
        </div>
        <?php unset($_SESSION['error']); ?>
    <?php endif; ?>

    <form method="POST" action="register.php">
        <label for="username">Gebruikersnaam:</label>
        <input type="text" name="username" id="username" required>

        <label for="password">Wachtwoord:</label>
        <input type="password" name="password" id="password" required>

        <button type="submit">Registreren</button>
    </form>

    <h2>Waarom password_hash?</h2>
    <p>
        Een wachtwoord sla je niet als normale tekst op. Met <code>password_hash()</code>
        wordt er een veilige hash gemaakt. Daardoor kan iemand niet meteen alle wachtwoorden lezen
        als die persoon ooit de database ziet.
    </p>
</main>
<?php require_once 'includes/footer.php'; ?>
