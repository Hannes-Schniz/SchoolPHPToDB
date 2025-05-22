<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include 'db.php';
?>
<style>
.message {
    border-radius: 8px;
    border: 1px solid #e0e0e0;
    background: #fafbfc;
    box-shadow: 0 2px 6px rgba(60, 60, 60, 0.06);
    margin-bottom: 1.5em;
    padding: 1.2em 1.5em;
    transition: box-shadow 0.2s;
}
.message:hover {
    box-shadow: 0 4px 16px rgba(60, 60, 60, 0.13);
    border-color: #b2dfdb;
}
.message .rubrik {
    display: inline-block;
    background: #4caf50;
    color: #fff;
    font-size: 0.95em;
    font-weight: bold;
    padding: 0.2em 0.8em;
    border-radius: 16px;
    margin-bottom: 0.5em;
    margin-right: 0.5em;
    letter-spacing: 0.5px;
}
.message .titel {
    font-size: 1.2em;
    font-weight: bold;
    margin: 0.2em 0 0.5em 0;
    color: #222;
}
.message .author {
    font-weight: bold;
    color: #333;
    margin-right: 1em;
}
.message .date {
    color: #888;
    font-size: 0.9em;
    margin-left: 0.5em;
}
.message .content {
    margin-top: 0.7em;
    font-size: 1.05em;
    line-height: 1.5;
    color: #222;
}
</style>
<?php
if (isset($ergebnis) && $ergebnis) {
    while ($zeile = mysqli_fetch_assoc($ergebnis)) {
        echo '<div class="message">';
        echo '<div class="rubrik">' . htmlspecialchars($zeile['bezeichnung']) . '</div>';
        echo '<div class="titel">' . htmlspecialchars($zeile['anzeigeueberschrift']) . '</div>';
        echo '<span class="author">' . htmlspecialchars($zeile['name']) . '</span>';
        if (!empty($zeile['anzeigedatum'])) {
            echo '<span class="date">' . htmlspecialchars($zeile['anzeigedatum']) . '</span>';
        }
        echo '<div class="content">' . nl2br(htmlspecialchars($zeile['anzeigetext'])) . '</div>';
        echo '</div>';
    }
} else {
    echo "<p>Keine Nachrichten gefunden.</p>";
}
?>