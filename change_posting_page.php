<!DOCTYPE html>
<html lang="de">
  <head>
    <meta charset="UTF-8" />
    <title>Anzeige bearbeiten – Schwarzes Brett</title>
    <style>
      body {
        background: #f4f4f4;
        font-family: Arial, sans-serif;
        margin: 0;
      }
      .navbar {
        background: #222;
        color: #fff;
        padding: 0.5em 2em;
        display: flex;
        justify-content: space-between;
        align-items: center;
      }
      .navbar .logo {
        font-size: 1.5em;
        font-weight: bold;
        letter-spacing: 1px;
      }
      .posting-container {
        max-width: 500px;
        margin: 3em auto;
        background: #fff;
        padding: 2.5em 2.5em 2em 2.5em;
        border-radius: 12px;
        box-shadow: 0 2px 16px rgba(0, 0, 0, 0.1);
      }
      h2 {
        margin-top: 0;
        text-align: center;
        color: #222;
        margin-bottom: 1.5em;
      }
      form {
        display: flex;
        flex-direction: column;
        gap: 1.2em;
      }
      .form-row {
        display: flex;
        flex-direction: row;
        align-items: center;
        gap: 1em;
      }
      .form-label {
        flex: 0 0 140px;
        font-weight: bold;
        color: #333;
        margin-bottom: 0;
        text-align: right;
      }
      .form-field {
        flex: 1 1 auto;
        display: flex;
        flex-direction: column;
      }
      input[type='text'],
      input[type='email'],
      textarea,
      select {
        padding: 0.6em;
        border: 1px solid #ccc;
        border-radius: 4px;
        font-size: 1em;
        background: #f9f9f9;
        transition: border 0.2s;
        width: 100%;
        box-sizing: border-box;
      }
      input[type='text']:focus,
      input[type='email']:focus,
      textarea:focus,
      select:focus {
        border: 1.5px solid #4caf50;
        outline: none;
        background: #fff;
      }
      textarea {
        min-height: 80px;
        resize: vertical;
      }
      input[type='submit'] {
        background: #4caf50;
        color: #fff;
        border: none;
        padding: 0.9em 0;
        border-radius: 4px;
        font-size: 1.1em;
        font-weight: bold;
        cursor: pointer;
        margin-top: 1em;
        transition: background 0.2s;
        width: 100%;
      }
      input[type='submit']:hover {
        background: #388e3c;
      }
      .back-link {
        display: block;
        text-align: center;
        margin-top: 1.5em;
        color: #2196f3;
        text-decoration: none;
      }
      .back-link:hover {
        text-decoration: underline;
      }
      @media (max-width: 600px) {
        .posting-container {
          padding: 1em;
        }
        .form-row {
          flex-direction: column;
          align-items: stretch;
        }
        .form-label {
          text-align: left;
          margin-bottom: 0.3em;
        }
      }
    </style>
  </head>
  <body>
    <nav class="navbar">
      <div class="logo">Schwarzes Brett</div>
      <a
        href="index.php"
        style="color: #fff; text-decoration: none; font-weight: bold"
        >Zurück</a
      >
    </nav>
    <div class="posting-container">
      <h2>Anzeige bearbeiten</h2>
      <?php
        include 'getPost.php';
        // Standardwerte
        $anzeigenummer = '';
        $name = '';
        $email = '';
        $nummer = '';
        $rubrik = '';
        $ueberschrift = '';
        $anzeigetext = '';
        if (isset($ergebnis) && $ergebnis && $row = mysqli_fetch_assoc($ergebnis)) {
          $anzeigenummer = htmlspecialchars($row['anzeigenummer']);
          $name = htmlspecialchars($row['name']);
          $email = htmlspecialchars($row['email']);
          $nummer = htmlspecialchars($row['nummer']);
          $rubrik = htmlspecialchars($row['rubriknummer']);
          $ueberschrift = htmlspecialchars($row['anzeigeueberschrift']);
          $anzeigetext = htmlspecialchars($row['anzeigetext']);
          #TODO: Mehrere Rubriken
        }
      ?>
      <form action="change_posting.php" method="post" autocomplete="off">
        <input type="hidden" name="anzeigenummer" value="<?php echo $anzeigenummer; ?>" />
        <div class="form-row">
          <label for="name" class="form-label">Ihr Name</label>
          <div class="form-field">
            <input type="text" id="name" name="name" maxlength="50" required value="<?php echo $name; ?>" />
          </div>
        </div>
        <div class="form-row">
          <label for="email" class="form-label">E-Mail</label>
          <div class="form-field">
            <input
              type="email"
              id="email"
              name="email"
              maxlength="255"
              required
              value="<?php echo $email; ?>" />
          </div>
        </div>
        <div class="form-row">
          <label for="nummer" class="form-label">Telefonnummer</label>
          <div class="form-field">
            <input
              type="text"
              id="nummer"
              name="nummer"
              maxlength="15"
              required
              value="<?php echo $nummer; ?>" />
          </div>
        </div>
        <div class="form-row">
          <label for="rubrik" class="form-label">Rubrik</label>
          <div class="form-field">
            <select id="rubrik" name="rubrik" required>
              <option value="">Bitte wählen...</option>
              <?php
                // Rubriken-Array
                $rubriken = [
                  1=>"Elektronik",2=>"Möbel",3=>"Fahrzeuge",4=>"Immobilien",5=>"Stellenangebote",6=>"Stellengesuche",
                  7=>"Dienstleistungen",8=>"Freizeit & Hobby",9=>"Haustiere",10=>"Bekleidung",11=>"Kinder & Baby",
                  12=>"Musikinstrumente",13=>"Sport & Fitness",14=>"Bücher & Zeitschriften",15=>"Bürobedarf",
                  16=>"Garten & Pflanzen",17=>"Spielzeug",18=>"Basteln & Handarbeit",19=>"Antiquitäten & Kunst",
                  20=>"Sammlungen",21=>"Heimwerken",22=>"Computer & Zubehör",23=>"Smartphones & Tablets",
                  24=>"Kameras & Optik",25=>"Tickets & Veranstaltungen",26=>"Reisen & Urlaub",27=>"Lebensmittel",
                  28=>"Haushaltsgeräte",29=>"Werkzeuge",30=>"Jobs auf Zeit",31=>"Praktika & Ausbildung",
                  32=>"Nachhilfe & Unterricht",33=>"Fahrgemeinschaften",34=>"Verloren & Gefunden",
                  35=>"Geschenke & Umsonst",36=>"Tauschangebote",37=>"Pflege & Betreuung",38=>"Umzüge & Transport",
                  39=>"Reparaturen & Handwerker",40=>"IT-Dienstleistungen",41=>"Grafik & Design",
                  42=>"Texter & Übersetzer",43=>"Rechtsberatung",44=>"Steuerberatung",45=>"Immobilienangebote",
                  46=>"Immobiliensuche",47=>"Fahrzeugvermietung",48=>"Haushaltshilfe",49=>"Tiersitting",50=>"Sonstiges"
                ];
                foreach ($rubriken as $num => $label) {
                  $selected = ($rubrik == $num) ? 'selected' : '';
                  echo "<option value=\"$num\" $selected>$label</option>";
                }
              ?>
            </select>
          </div>
        </div>
        <div class="form-row">
          <label for="anzeigeueberschrift" class="form-label"
            >Überschrift</label
          >
          <div class="form-field">
            <input
              type="text"
              id="anzeigeueberschrift"
              name="anzeigeueberschrift"
              maxlength="50"
              required
              value="<?php echo $ueberschrift; ?>" />
          </div>
        </div>
        <div class="form-row">
          <label for="anzeigetext" class="form-label">Anzeigentext</label>
          <div class="form-field">
            <textarea
              id="anzeigetext"
              name="anzeigetext"
              maxlength="255"
              required><?php echo $anzeigetext; ?></textarea>
          </div>
        </div>
        <input type="submit" value="Anzeige speichern" />
      </form>
      <a class="back-link" href="index.php"
        >&larr; Zurück zum Schwarzen Brett</a
      >
    </div>
  </body>
</html>
