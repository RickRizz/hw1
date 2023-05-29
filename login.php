<?php
  session_start();
  if(isset($_SESSION["id"])){
    header("location: home.php");
    exit;
  }

  

  


 if(!empty($_POST["username"]) && !empty($_POST["password"])){
     $con= mysqli_connect("localhost","root", "","games&co");
     if(!$con){
        die("collegamento fallito");
     }
     $username= mysqli_real_escape_string($con,$_POST["username"]);
     $password=mysqli_real_escape_string($con,$_POST["password"]);
     $query="SELECT * from users where username= '$username'";
     $res= mysqli_query($con, $query) or die(mysqli_error($con));
     if(mysqli_num_rows($res)>0){
        $user= mysqli_fetch_assoc($res);
        if($user['password']=== $password){
            $_SESSION["id"]= $user["id"];
            header("location:home.php");
            mysqli_free_result($res);
            mysqli_close($con);
            exit;
        }
        $_GET['message']= "Username e/o password errati!";
     }
     else
      $_GET['message']= "Username e/o password errati!";
 }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="login.css?ts=<?=time()?>&quot"> 
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">  
</head>
<body>
      
<header>
<a href="index.php">
    <div class="logo">
      <img src="./img/game-controller.png" alt="Gaming Controller Icon"> 
      <h1>Games&amp;Co</h1>
    </div>
</a>

</header>
    <!-- STAMPA IL MESSAGGIO SE LA REGISTRAZIONE è AVVENUTA CON SUCCESSO        -->
    <?php
      if(isset($_GET["message"])){
        echo '<div id="message"> <p>'. $_GET["message"] .'</p> </div>';
        unset($_GET["message"]);
      }
    
    ?>
<div class="container">
    <h1>Accedi al tuo account</h1>
    <form method='post'>
      
      <div class="form-group">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
      </div>
      <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
      </div>
     
      <button type="submit" id="accedi">Accedi</button>
    </form>
    <p id="link_registrazione">Non sei ancora registrato? <a href="signup.php">Clicca qui!</a></p>
  </div>
  <script src="login.js?ts=<?=time()?>&quot"></script>
  </body>


</html>