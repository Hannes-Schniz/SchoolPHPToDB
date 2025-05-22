<!DOCTYPE html>
<html lang="de">
  <head>
    <meta charset="UTF-8" />
    <title>Schwarzes Brett</title>
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
      .container {
        max-width: 800px;
        margin: 2em auto;
        background: #fff;
        padding: 2em;
        border-radius: 8px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
      }
      h1 {
        margin-top: 0;
      }
      .message-board {
        margin-top: 2em;
      }
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
      .message .titel {
        font-size: 1.2em;
        font-weight: bold;
        margin: 0.2em 0 0.5em 0;
        color: #222;
      }
      .message .content {
        margin-top: 0.7em;
        font-size: 1.05em;
        line-height: 1.5;
        color: #222;
      }
      @media (max-width: 600px) {
        .container {
          padding: 1em;
        }
        .message {
          padding: 1em;
        }
      }
      .rubrik-sidebar {
        width: 210px;
        min-width: 180px;
        padding: 1.5em 0.5em 1.5em 1em;
        background: #f7f7f7;
        border-right: 1px solid #e0e0e0;
        height: 100vh;
        overflow-y: auto;
        position: sticky;
        top: 0;
      }
      .rubrik-buttons {
        display: flex;
        flex-direction: column;
        gap: 0.4em;
      }
      .rubrik-buttons a {
        display: block;
        background: #e0e0e0;
        color: #222;
        text-decoration: none;
        padding: 0.45em 0.8em;
        border-radius: 4px;
        font-size: 1em;
        transition: background 0.15s;
        font-weight: 500;
      }
      .rubrik-buttons a:hover {
        background: #4caf50;
        color: #fff;
      }
      @media (max-width: 900px) {
        .rubrik-sidebar {
          display: none;
        }
      }
    </style>
  </head>
  <body>
    <nav class="navbar">
      <div class="logo">Schwarzes Brett</div>
      <div style="flex: 1"></div>
      <a
        href="add_posting.html"
        style="
          background: #4caf50;
          color: #fff;
          padding: 0.4em 1.2em;
          border-radius: 4px;
          text-decoration: none;
          font-weight: bold;
          font-size: 1em;
          transition: background 0.2s;
          margin-left: auto;
          display: inline-block;
        ">
        + Neue Anzeige
      </a>
    </nav>
    <div style="display: flex">
      <div class="rubrik-sidebar">
        <div class="rubrik-buttons">
          <a href="?rubrik=1">Elektronik</a>
          <a href="?rubrik=2">Möbel</a>
          <a href="?rubrik=3">Fahrzeuge</a>
          <a href="?rubrik=4">Immobilien</a>
          <a href="?rubrik=5">Stellenangebote</a>
          <a href="?rubrik=6">Stellengesuche</a>
          <a href="?rubrik=7">Dienstleistungen</a>
          <a href="?rubrik=8">Freizeit &amp; Hobby</a>
          <a href="?rubrik=9">Haustiere</a>
          <a href="?rubrik=10">Bekleidung</a>
          <a href="?rubrik=11">Kinder &amp; Baby</a>
          <a href="?rubrik=12">Musikinstrumente</a>
          <a href="?rubrik=13">Sport &amp; Fitness</a>
          <a href="?rubrik=14">Bücher &amp; Zeitschriften</a>
          <a href="?rubrik=15">Bürobedarf</a>
          <a href="?rubrik=16">Garten &amp; Pflanzen</a>
          <a href="?rubrik=17">Spielzeug</a>
          <a href="?rubrik=18">Basteln &amp; Handarbeit</a>
          <a href="?rubrik=19">Antiquitäten &amp; Kunst</a>
          <a href="?rubrik=20">Sammlungen</a>
          <a href="?rubrik=21">Heimwerken</a>
          <a href="?rubrik=22">Computer &amp; Zubehör</a>
          <a href="?rubrik=23">Smartphones &amp; Tablets</a>
          <a href="?rubrik=24">Kameras &amp; Optik</a>
          <a href="?rubrik=25">Tickets &amp; Veranstaltungen</a>
          <a href="?rubrik=26">Reisen &amp; Urlaub</a>
          <a href="?rubrik=27">Lebensmittel</a>
          <a href="?rubrik=28">Haushaltsgeräte</a>
          <a href="?rubrik=29">Werkzeuge</a>
          <a href="?rubrik=30">Jobs auf Zeit</a>
          <a href="?rubrik=31">Praktika &amp; Ausbildung</a>
          <a href="?rubrik=32">Nachhilfe &amp; Unterricht</a>
          <a href="?rubrik=33">Fahrgemeinschaften</a>
          <a href="?rubrik=34">Verloren &amp; Gefunden</a>
          <a href="?rubrik=35">Geschenke &amp; Umsonst</a>
          <a href="?rubrik=36">Tauschangebote</a>
          <a href="?rubrik=37">Pflege &amp; Betreuung</a>
          <a href="?rubrik=38">Umzüge &amp; Transport</a>
          <a href="?rubrik=39">Reparaturen &amp; Handwerker</a>
          <a href="?rubrik=40">IT-Dienstleistungen</a>
          <a href="?rubrik=41">Grafik &amp; Design</a>
          <a href="?rubrik=42">Texter &amp; Übersetzer</a>
          <a href="?rubrik=43">Rechtsberatung</a>
          <a href="?rubrik=44">Steuerberatung</a>
          <a href="?rubrik=45">Immobilienangebote</a>
          <a href="?rubrik=46">Immobiliensuche</a>
          <a href="?rubrik=47">Fahrzeugvermietung</a>
          <a href="?rubrik=48">Haushaltshilfe</a>
          <a href="?rubrik=49">Tiersitting</a>
          <a href="?rubrik=50">Sonstiges</a>
        </div>
      </div>
      <div style="flex: 1">
        <div class="container">
          <h1>Willkommen beim Schwarzen Brett!</h1>
          <div class="message-board" id="message-board">
            <?php include 'messages.php';?>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
