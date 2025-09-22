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

  <main>
    <h1>Welkom op mijn portofolio!</h1>
  </main>

  <footer>
    © <?php echo date("Y"); ?> Swarley
  </footer>
<script src="script.js"></script>
</body>
</html>
