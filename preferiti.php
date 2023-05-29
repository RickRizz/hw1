<?php
session_start();
if(!isset($_SESSION["id"])){
   header("location: login.php");
}

header('Content-Type: application/json');
$conn= mysqli_connect("localhost","root", "","games&co");

$userid= mysqli_real_escape_string($conn,$_SESSION["id"]);
$query = "SELECT id AS id, content AS content FROM games WHERE user = $userid";
$res = mysqli_query($conn, $query) or die(mysqli_error($conn));
$games= array();
while($entry = mysqli_fetch_assoc($res)) {
      $games[]=array('content' => json_decode($entry['content']),'id'=> json_decode($entry['id']));
}

echo json_encode($games);
mysqli_close($conn);

exit;




?>