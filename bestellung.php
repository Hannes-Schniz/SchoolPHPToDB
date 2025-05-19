<!DOCTYPE html>                           <!-- HTML5-Dokument -->
<html lang="de">                          <!-- Sprache: Deutsch -->
  <head>                                  <!-- Start des Kopfes -->
    <meta charset="utf-8">                <!-- Zeichenkodierung -->
    <meta name="keywords" content="Hertz, Schule">
    <title>Daten in MySQL-Datenbank speichern</title>
  </head>
<body>
<h3>Daten in eine Tabelle einf&uuml;gen</h3>
	<?php
		$server = "localhost";  
		$user   = "root";  
		$pass   = "";
		$db     = "obstladen";
		$vorname 	= $_POST["vorname"];
		$nachname 	= $_POST["nachname"];
		$ort 		= $_POST["ort"];
		$sorte 		= $_POST["sorte"];
		$menge 		= $_POST["menge"];
		$verbindung = mysqli_connect($server, $user, $pass,$db);
		if (mysqli_connect_errno()) {
			echo "<p><i>Die Datenbank <b>$db</b> wurde aktiviert...</i></p>";
		} else {
			$sql  = "INSERT INTO bestellung (Vorname,Nachname,Ort,Sorte,Menge)";
			$sql .= " VALUES ('$vorname', '$nachname', '$ort', '$sorte', $menge)";
			$ergebnis = mysqli_query($verbindung, $sql);
			if($ergebnis){
				echo "<p>Vielen Dank, Ihre Bestellung wurde gespeichert...</p>";
			} else {
				echo "<p>Die SQL-Anweisung ist fehlgeschlagen...</p>";
			}
			mysqli_close($verbindung);
		}
	?>
</body>
</html>