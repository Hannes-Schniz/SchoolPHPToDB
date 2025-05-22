<?php
// Fehlerausgabe aktivieren (nur für Entwicklung)
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Eingaben holen und trimmen
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $nummer = trim($_POST['nummer'] ?? '');
    $password = $_POST['password'] ?? '';

    // Validierung (einfach)
    if ($name === '' || $email === '' || $nummer === '' || $password === '') {
        die('Bitte alle Felder ausfüllen.');
    }

    // Passwort hashen
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    // DB-Verbindung
    $server = "localhost";
    $user   = "php";
    $pass   = "7nAgjuIOS9rTMotVNKalsURBykbH0qjFjVcZWC58eVnLcH72X";
    $db     = "schwarzesBrett";
    $verbindung = mysqli_connect($server, $user, $pass, $db);

    if (mysqli_connect_errno()) {
        die("Verbindungsfehler zur Datenbank.");
    }

    // E-Mail darf nur einmal vorkommen
    $stmt = mysqli_prepare($verbindung, "SELECT COUNT(*) FROM inserent WHERE email = ?");
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $count);
    mysqli_stmt_fetch($stmt);
    mysqli_stmt_close($stmt);

    if ($count > 0) {
        die("Diese E-Mail ist bereits registriert.");
    }

    // Einfügen
    $stmt = mysqli_prepare($verbindung, "INSERT INTO inserent (name, email, nummer, password, isAdmin) VALUES (?, ?, ?, ?, 0)");
    mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $nummer, $passwordHash);

    if (mysqli_stmt_execute($stmt)) {
        mysqli_stmt_close($stmt);
        mysqli_close($verbindung);
        header("Location: index.html?signup=success");
        exit;
    } else {
        mysqli_stmt_close($stmt);
        mysqli_close($verbindung);
        die("Fehler beim Registrieren.");
    }
} else {
    // Kein POST
    header("Location: signup.html");
    exit;
}
?>