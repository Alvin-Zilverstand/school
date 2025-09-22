<!DOCTYPE html>
<html lang="nl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lorenzo van Matterhorn - Portofolio</title>
  <link rel="stylesheet" href="style.css" >
 
</head>
<body>
  <button class="dark-toggle" onclick="toggleDarkMode()"></button>
  <header>
    <h1><a href=".">Lorenzo van Matterhorn</a></h1>
    <p>Student Software Developer op het Vista College</p>
    <nav>
      <?php require_once("mainmenu.php"); ?>
    </nav>
    <div class="mountains"></div>
  </header>

  <nav> </nav>
  <main></main>
  <main>
    <h1>Wie ben ik?</h1>
    <p>Hoi! Ik ben Lorenzo van Matterhorn, een enthousiaste en leergierige student software developer op het Vista College. Met een passie voor technologie en programmeren werk ik hard om mijn vaardigheden te verbeterd en coole software te maken die mensen echt kunnen gebruiken.</p>
    <p>Op deze site deel ik mijn projecten, wat ik geleerdt heb en hoe ik steeds beter word als developer. Ik probeer altijd nieuwe dingen uit en leer elke dag bij, zodat ik straks echt goei ben in wat ik doe. Of je nou een werkgever bent, een medeprogrammeur of gewoon niewsgierig, neem vooral een kijkje en zie wat ik allemaal kan.</p>
    <p>Tijdens mijn studtie ben ik bezig geweest met verschillende projecten, van kleine apps tot grotere websites. Door deze ervaringen heb ik veel geleerd over het ontwerpen en bouwen van software, en hoe je samen met anderen het beste resultaat behaaldt.</p>
    <p>Ik ben altijd op zoek naar nieuwe uitdagingen en samenwerkingen, dus stuur gerust een berichtje als je interese hebt om samen te werken of gewoon vragen hebt!</p>
  </main>

  <footer>
    © <?php echo date("Y"); ?> Swarley
  </footer>
<script src="script.js"></script>
</body>
</html>
