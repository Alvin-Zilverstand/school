<!DOCTYPE html>
<html lang="nl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lorenzo van Matterhorn - Portofolio</title>
  <link rel ="stylesheet" href="style.css">
 
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
    <h1>Hoe kom je in contact met mij?</h1>
    <p>Hoi! Ik ben Lorenzo van Matterhorn,</p>
    <p>Mail me via: <a href="mailto:l.v.m@gmeel.com">Mail mij</a></p>
    <p>Of bel me op: 06-12345678</p>
    <p>Je kunt me ook vinden op LinkedIn: <a href="https://www.linkedin.com/in/lorenzovanmatterhorn" target="_blank">Mijn LinkedIn</a></p>
    <p>Of volg me op GitHub: <a href="https ://github.com/lorenzovanmatterhorn" target="_blank">Mijn GitHub</a></p>
    <p>Ik kijk ernaar uit om van je te horen!</p> 
  </main>

  <footer>
    © <?php echo date("Y"); ?> Swarley
  </footer>
<script src="script.js"></script>
</body>
</html>
