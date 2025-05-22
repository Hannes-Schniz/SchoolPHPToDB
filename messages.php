<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
header('Content-Type: application/json');
include 'db.php';
$messages = [];
if (isset($ergebnis) && $ergebnis) {
    while ($zeile = mysqli_fetch_assoc($ergebnis)) {
        $messages[] = [
            'titel'      => $zeile['titel'] ?? '',
            'rubrik'     => $zeile['bezeichnung'] ?? '',
            'name'       => $zeile['name'] ?? '',
            'datum'      => $zeile['anzeigedatum'] ?? '',
            'nachricht'  => $zeile['anzeigetext'] ?? ''
        ];
    }
}
echo json_encode($messages);
?>