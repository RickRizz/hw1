<?php
 session_start();
 if(!isset($_SESSION["id"])){
    header("location: login.php");
 }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La mia libreria</title>
    <link rel="stylesheet" href="libreria.css?ts=<?=time()?>&quot">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">  
</head>
<body>
      
    <header>
    <a href="home.php">
      <div class="logo">
        <img src="./img/game-controller.png" alt="Gaming Controller Icon">
        <h1>Games&Co</h1>
      </div>
    </a>
    <nav>
    <ul class="menu">
      <li><a href="home.php">HOME</a></li>
      <li><a href="logout.php">LOGOUT</a></li>
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
  <div>
        <h1>Games&Co</h1>
        <img src="./img/game-controller.png" alt="Gaming Controller Icon">
   </div>
  <ul class="curtain-menu">
    <li><a href="home.php">HOME</a></li>
    <li><a href="logout.php">LOGOUT</a></li>
  </ul>
</div>

<h1 id="libreria">LA MIA LIBRERIA</h1>
<hr>
<div id="vetrina">
  
</div>
<div id="libreria-vuota">
   <h1>La tua libreria è vuota</h1>
   <h3>Non hai aggiunto alcun gioco ai preferiti</h3>
</div>

<footer>
  <div class="footer-content">
    <div class="footer-logo">
      <img src="./img/game-controller.png" alt="Games&Co Footer Logo">
    </div>
    <div class="footer-links">
      <ul>
        <li><a href="#">Chi siamo</a></li>
        <li><a href="#">Contattaci</a></li>
        <li><a href="#">Termini e condizioni</a></li>
        <li><a href="#">Privacy</a></li>
      </ul>
    </div>
  </div>
  <div class="footer-bottom">
    <p>&copy; 2023 Games&Co. All rights reserved.</p>
  </div>
</footer>

   <script src="libreria.js?ts=<?=time()?>&quot"></script>
</body>

</html>