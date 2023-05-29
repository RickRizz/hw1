
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Games&Co</title>
    <link rel="stylesheet" href="index.css?ts=<?=time()?>&quot"> 
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">  
</head>
<body>
      
<header>
    <div class="logo">
      <img src="./img/game-controller.png" alt="Gaming Controller Icon">
      <h1>Games&Co</h1>
    </div>
    <nav>
    <ul class="menu">
      <li><a href="home.php">HOME</a></li>
      <li><a href="login.php">ACCEDI</a></li>
      <li><a href="signup.php">ISCRIVITI</a></li>
    </ul>
    <div id="mobile-menu-icon" class="mobile-menu-icon">
      <span></span>
      <span></span>
      <span></span>
    </div>
  </nav>
</header>
<div class="curtain">
  <span class="close-icon">&times;</span>
  <div class="logo">
      <h1>Games&Co</h1>
      <img src="./img/game-controller.png" alt="Gaming Controller Icon">
    </div>
  <ul class="curtain-menu">
    <li><a href="home.php">HOME</a></li>
    <li><a href="login.php">ACCEDI</a></li>
    <li><a href="signup.php">ISCRIVITI</a></li>
  </ul>
</div>

      <div id="container_sfondo">
        <div id="sfondo"> </div>
        <h1 id="titolo">GAMES&CO </h1>
        <div id="descrizione">
          <h2>Esplora il più grande database di videogames</h2>
          <button id="pulsante"> START </button>
        </div>
      </div>
      <footer>
  <div class="footer-content">
    <div class="footer-logo">
      <img src="./img/game-controller.png" alt="Games&Co Footer Logo">
    </div>
    <div class="footer-links">
      <ul>
        <li><a>Chi siamo</a></li>
        <li><a>Contattaci</a></li>
        <li><a>Termini e condizioni</a></li>
        <li><a>Privacy</a></li>
      </ul>
    </div>
  </div>
  <div class="footer-bottom">
    <p>&copy; 2023 Games&Co. All rights reserved.</p>
  </div>
</footer>
<script src="index.js?ts=<?=time()?>&quot"></script>
</body>

</html>