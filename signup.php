<?php
session_start();


if(isset($_SESSION["id"])){
  header("location: home.php");
  exit;
}
 $error="";
if (!empty($_POST["name"]) && !empty($_POST["email"]) && $_POST["username"] && !empty($_POST["password"]) )
{
  
   $con= mysqli_connect("localhost","root", "","games&co");
   $name= mysqli_real_escape_string($con, $_POST['name']);
   $mail= mysqli_real_escape_string($con, $_POST['email']);
   $username= mysqli_real_escape_string($con, $_POST['username']);
   $password= mysqli_real_escape_string($con, $_POST['password']);
   //controllo che il nome non contenga numeri
   if(!preg_match("/^[A-Za-z]+$/",$name)){
    $error="Il nome che hai inserito contiene numeri";
    header("location: signup.php?error=" . urlencode($error));
    die; 
   }
   //controllo che l'email abbia il formato giusto
   if(!preg_match("/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/", $mail)){
     $error="L'email che hai inserito non rispetta il formato previsto";
     header("location: signup.php?error=" . urlencode($error));
     die; 
   }
   //controllo se l'username sia già in uso
   $query= "SELECT * from users where username ='$username'";
   $res= mysqli_query($con, $query) or die(mysqli_error($con));
   if( mysqli_num_rows($res)>0){
         $error="Username già in uso";
         header("location: signup.php?error=" . urlencode($error));
         die; 
   }
   
   //controllo se l'email sia già in uso
   $query= "SELECT * from users where email ='$mail'";
   $res= mysqli_query($con, $query) or die(mysqli_error($con));
   if(mysqli_num_rows($res)>0){
        
         $error="Mail già in uso";
         header("location: signup.php?error=" . urlencode($error));
         exit;
   }
    //controllo se la password rispetti il formato
    if(!preg_match("/^[A-Za-z]\w{7,15}$/","$password")){
          $error="La password prevede una lunghezza tra 8 e 16 caratteri alfanumerici";
          header("location: signup.php?error=" . urlencode($error));
          exit;
    } 
   //le credenziali sono valide e posso registrarle
   $query= "INSERT INTO users(nome, email, username, password) VALUES('$name','$mail','$username','$password')";
   if(mysqli_query($con, $query)){
    $success="Registrazione avvenuta con successo";
    header("location:login.php?message=". urlencode($success));
    die;
   }
  else{
    $error="Qualcosa e' andato storto durante la registrazione";
    header("location: signup.php?error=" . urlencode($error));
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrati</title>
    <link rel="stylesheet" href="signup.css?ts=<?=time()?>&quot"> 
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">  
</head>
<body>
      
<header>
    <div class="logo">
      <img src="./img/game-controller.png" alt="Gaming Controller Icon">
      <h1>Games&amp;Co</h1>
    </div>
    
</header>
<div class="container">
    <h1>Registrati</h1>
    <?php if (isset($_GET['error'])) { ?>
        <p style="color: red;"><?php echo $_GET['error']; ?></p>
    <?php } ?>
    <form method='post'>
    <div id="name" class="form-group">
        <label for="name">Nome:</label>
        <input type="text"  name="name" required>
        <span>Inserire un nome valido! </span>
      </div>
      <div id="email" class="form-group">
        <label for="email">Email:</label>
        <input type="email"  name="email" required>
        <span>Inserire un email valida! </span>
      </div>
      <div id="username" class="form-group">
        <label for="username">Username:</label>
        <input type="text" name="username" required>
        <span>Inserire un nome valido! </span>
      </div>
      <div  id="password" class="form-group">
        <label for="password">Password:</label>
        <input type="password"  name="password" required>
        <span>Inserire una password valida! </span>
      </div>
      <button type="submit" id="registrati">Registrati</button>
    </form>
    <p id="link_registrazione">Sei già registrato? <a href="login.php">Accedi!</a></p>
  </div>
  <script src="signup.js?ts=<?=time()?>&quot"></script>
  </body>


</html>