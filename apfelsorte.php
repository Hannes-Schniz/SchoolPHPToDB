	<?php
		$server = "localhost:3310";  
		$user   = "root";  
		$pass   = "";
		$db     = "obstladen";
		$verbindung = mysqli_connect($server, $user, $pass,$db);
		$apfelsorte= $_POST["sorte"];
		if (mysqli_connect_errno()) {
			echo "<p>Es ist ein Verbindungsfehler aufgetreten.</p>";
		} else {
			echo "<p>Die Verbindung mit dem Server wurde hergestellt.</p>";
			$sql = "SELECT SUM(Menge) FROM bestellung where Sorte ='".$apfelsorte."'";
			$ergebnis = mysqli_query($verbindung, $sql);
			if($ergebnis)	{
				echo "<p>Die SQL-Anweisung war erfolgreich...</p>";
				$res = mysqli_fetch_array($ergebnis)[0];
				echo "<p>In der Tabelle befinden sich $res Äpfel der Sorte $apfelsorte</p>";
			

			} else {
				echo "SQL-Fehler!<br>SQL meldet: " .mysqli_error($verbindung);   
			}
			mysqli_close($verbindung);
			echo "<p>Die Verbindung mit dem Server wurde beendet.";
		}
	?>