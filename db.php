<?php
    $server = "localhost";
    $user   = "php";
    $pass   = "7nAgjuIOS9rTMotVNKalsURBykbH0qjFjVcZWC58eVnLcH72X";
    $db     = "schwarzesBrett";
    $verbindung = mysqli_connect($server, $user, $pass, $db);
    if (mysqli_connect_errno()) {
        echo "<p>Es ist ein Verbindungsfehler aufgetreten.</p>";
        $ergebnis = false;
    } else {
		if (isset($_GET['rubrik'])) {
    		$rubrik = $_GET['rubrik'];
			$sql = "SELECT * FROM anzeige a join inserent i on a.inseretennummer = i.inserentennummer join rubrikzuordnung z on z.anzeigenummer = a.anzeigenummer join anzeigerubrik r on r.rubriknummer = z.rubriknummer where r.rubriknummer = $rubrik ORDER BY a.anzeigedatum DESC ";
        $ergebnis = mysqli_query($verbindung, $sql);
		}
		else {
$sql = "SELECT * FROM anzeige a join inserent i on a.inseretennummer = i.inserentennummer join rubrikzuordnung z on z.anzeigenummer = a.anzeigenummer join anzeigerubrik r on r.rubriknummer = z.rubriknummer ORDER BY r.bezeichnung, a.anzeigedatum DESC ";
        $ergebnis = mysqli_query($verbindung, $sql);
		}
        
        // Die Verbindung wird NICHT geschlossen, damit $ergebnis weiterverwendet werden kann.
	
	}

?>