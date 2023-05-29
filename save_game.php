<?php
  session_start();
  if(!isset($_SESSION["id"])){
     header("location: login.php");
  }

  $conn= mysqli_connect("localhost","root", "","games&co");

  $userid= $_SESSION["id"];
  $gameid=mysqli_real_escape_string($conn, $_POST['id']);
  $copertina=mysqli_real_escape_string($conn, $_POST['copertina']);
  $titolo=mysqli_real_escape_string($conn, $_POST['titolo']);

  //controllo se il gioco risulta tra già tra i preferiti dell'utente
  $query = "SELECT * FROM games WHERE user = '$userid' AND id = '$gameid'";
  $res = mysqli_query($conn, $query) or die(mysqli_error($conn));
  //se è già tra i preferiti non faccio nulla
  if(mysqli_num_rows($res) > 0) {
      echo true;
      exit;
  }

  $query= "INSERT INTO games(id,user,content) VALUES('$gameid','$userid',JSON_OBJECT('copertina','$copertina','titolo','$titolo'))";
  $res= mysqli_query($conn,$query);
  if($res){
    echo true;
    
    exit;
  }

  mysqli_close($conn);
 //se arrivo qua qualcosa è andato storto e quindi ritorno false
  echo json_encode(false);

  
  

 ?>
  