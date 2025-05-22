<?php
// Fehlerausgabe aktivieren (nur für Entwicklung)
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Eingaben holen und trimmen
    $anzeigenummer = intval($_POST['anzeigenummer'] ?? 0); // Muss im Formular mitgegeben werden!
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $nummer = trim($_POST['nummer'] ?? '');
    $rubrik = intval($_POST['rubrik'] ?? 0);
    $ueberschrift = trim($_POST['anzeigeueberschrift'] ?? '');
    $text = trim($_POST['anzeigetext'] ?? '');

    // Validierung
    if (
        $anzeigenummer < 1 ||
        $name === '' || $email === '' || $nummer === '' ||
        $rubrik < 1 || $ueberschrift === '' || $text === ''
    ) {
        die('Bitte alle Felder korrekt ausfüllen.');
    }

    // DB-Verbindung
    $server = "localhost";
    $user   = "php";
    $pass   = "7nAgjuIOS9rTMotVNKalsURBykbH0qjFjVcZWC58eVnLcH72X";
    $db     = "schwarzesBrett";
    $conn = mysqli_connect($server, $user, $pass, $db);

    if (mysqli_connect_errno()) {
        die("Verbindungsfehler zur Datenbank.");
    }

    // Inserent updaten (oder ggf. anlegen, falls du das möchtest)
    $stmt = mysqli_prepare($conn, "UPDATE inserent SET name = ?, nummer = ? WHERE email = ?");
    mysqli_stmt_bind_param($stmt, "sss", $name, $nummer, $email);
    mysqli_stmt_execute($stmt);

    // Inserentennummer holen
    $stmt = mysqli_prepare($conn, "SELECT inserentennummer FROM inserent WHERE email = ?");
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $inserentennummer);
    if (!mysqli_stmt_fetch($stmt)) {
        die("Inserent nicht gefunden.");
    }
    mysqli_stmt_close($stmt);

    // Anzeige updaten
    $stmt = mysqli_prepare($conn, "UPDATE anzeige SET anzeigetext = ?, anzeigeueberschrift = ?, inseretennummer = ? WHERE anzeigenummer = ?");
    mysqli_stmt_bind_param($stmt, "ssii", $text, $ueberschrift, $inserentennummer, $anzeigenummer);
    if (!mysqli_stmt_execute($stmt)) {
        die("Fehler beim Aktualisieren der Anzeige.");
    }

    // Rubrikzuordnung updaten
    $stmt = mysqli_prepare($conn, "UPDATE rubrikzuordnung SET rubriknummer = ? WHERE anzeigenummer = ?");
    mysqli_stmt_bind_param($stmt, "ii", $rubrik, $anzeigenummer);
    if (!mysqli_stmt_execute($stmt)) {
        die("Fehler beim Aktualisieren der Rubrik.");
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);

    // Erfolgreich
    header("Location: index.php");
    exit;
} else {
    header("Location: add_posting.html");
    exit;
}
?>