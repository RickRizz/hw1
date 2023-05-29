<?php
  session_start();
  if(!isset($_SESSION["id"])){
     header("location: login.php");
  }

  $conn= mysqli_connect("localhost","root", "","games&co");

  $userid= $_SESSION["id"];
  $gameid=mysqli_real_escape_string($conn, $_POST['id']);

  $query = "DELETE FROM games WHERE user = '$userid' AND id = '$gameid'";
  $res = mysqli_query($conn, $query) or die(mysqli_error($conn));
  echo json_encode(array('ok' => true));
  mysqli_close($conn);
  exit;

  ?>