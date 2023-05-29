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
    <title>Home</title>
    <link rel="stylesheet" href="home.css?ts=<?=time()?>&quot">
    
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
      <li><a href="libreria.php" id="libreria"><img src="./img/open-book.png">LIBRERIA</a></li>
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
    <li><a href="libreria.php">LIBRERIA</a></li>
    <li><a href="logout.php">LOGOUT</a></li>
  </ul>
</div>

<div id="container_sfondo">
   <h1 id="sfondo">Il più grande database di videogames</h1>     
</div>

<section>
 
<div class="search-container">
  <form id="search-form">
    <input type="text" id="search-input" placeholder="Cerca giochi...">
    <button id="search-button"><i class="fas fa-search"></i></button>
  </form>
  <div id="search-results">

  </div>
</div>

<div id="info-libreria">
  <h1>Esplora una libreria piena di giochi </h1>
  <h3>Contrassegna i preferiti cliccando sul cuore</h3>
</div>

</section>
<hr>
<h1 id="notizie">Le ultime notizie</h1>
<div id="vetrina">
  
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
   <script src="home.js?ts=<?=time()?>&quot"></script>
</body>
</html>