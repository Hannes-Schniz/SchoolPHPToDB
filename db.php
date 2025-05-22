	<?php
		$server = "localhost";  
		$user   = "php";  
		$pass   = "7nAgjuIOS9rTMotVNKalsURBykbH0qjFjVcZWC58eVnLcH72X";
		$db     = "schwarzesBrett";
		$verbindung = mysqli_connect($server, $user, $pass,$db);
		if (mysqli_connect_errno()) {
			echo "<p>Es ist ein Verbindungsfehler aufgetreten.</p>";
		} else {
			echo "<p>Die Verbindung mit dem Server wurde hergestellt.</p>";
			$sql = "SELECT * FROM inserent";
			$ergebnis = mysqli_query($verbindung, $sql);
			if($ergebnis)	{
				echo "<p>Die SQL-Anweisung war erfolgreich...</p>";
				$anzahl = mysqli_num_rows($ergebnis);
				echo "<p>In der Tabelle befinden sich $anzahl Datens�tze:</p>";
				while ($zeile = mysqli_fetch_array($ergebnis)){
					echo $zeile["name"] ."<br>";
			}

			} else {
				echo "SQL-Fehler!<br>SQL meldet: " .mysqli_error($verbindung);   
			}
			mysqli_close($verbindung);
			echo "<p>Die Verbindung mit dem Server wurde beendet.";
		}
	?>