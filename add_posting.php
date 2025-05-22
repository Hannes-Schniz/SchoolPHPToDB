<?php
// Fehlerausgabe aktivieren (nur für Entwicklung)
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Eingaben holen und trimmen
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $nummer = trim($_POST['nummer'] ?? '');
    $rubrik = intval($_POST['rubrik'] ?? 0);
    $ueberschrift = trim($_POST['anzeigeueberschrift'] ?? '');
    $text = trim($_POST['anzeigetext'] ?? '');

    // Validierung
    if (
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

    // Prüfen, ob Inserent existiert, sonst anlegen
    $stmt = mysqli_prepare($conn, "SELECT inserentennummer FROM inserent WHERE email = ?");
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $inserentennummer);
    if (!mysqli_stmt_fetch($stmt)) {
        mysqli_stmt_close($stmt);
        // Neuen Inserenten anlegen
        $stmt = mysqli_prepare($conn, "INSERT INTO inserent (name, email, nummer) VALUES (?, ?, ?)");
        mysqli_stmt_bind_param($stmt, "sss", $name, $email, $nummer);
        if (!mysqli_stmt_execute($stmt)) {
            die("Fehler beim Anlegen des Inserenten.");
        }
        $inserentennummer = mysqli_insert_id($conn);
    } else {
        mysqli_stmt_close($stmt);
    }

    // Anzeige anlegen
    $heute = date('Y-m-d');
    $stmt = mysqli_prepare($conn, "INSERT INTO anzeige (anzeigetext, anzeigeueberschrift, anzeigedatum, inseretennummer) VALUES (?, ?, ?, ?)");
    mysqli_stmt_bind_param($stmt, "sssi", $text, $ueberschrift, $heute, $inserentennummer);
    if (!mysqli_stmt_execute($stmt)) {
        die("Fehler beim Anlegen der Anzeige.");
    }
    $anzeigenummer = mysqli_insert_id($conn);

    // Rubrikzuordnung anlegen
    $stmt = mysqli_prepare($conn, "INSERT INTO rubrikzuordnung (anzeigenummer, rubriknummer) VALUES (?, ?)");
    mysqli_stmt_bind_param($stmt, "ii", $anzeigenummer, $rubrik);
    if (!mysqli_stmt_execute($stmt)) {
        die("Fehler beim Zuordnen der Rubrik.");
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