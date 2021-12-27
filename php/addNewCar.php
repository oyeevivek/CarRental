<?php
include 'conn.php';
session_start();
// $dir = "http://" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
// $basePath = str_replace("php/".basename(__FILE__),"",$dir);
if(!isset($_SESSION['user']) || $_SESSION['type'] != 'agency'){
  header("Location:../index.php");
}
if(isset($_POST['vmodel']) && isset($_POST['vnum']) && isset($_POST['scap']) && isset($_POST['rpd'])){
    $vmodel = preg_replace('/\s+/', '',$_POST['vmodel']);
    $vnum = preg_replace('/\s+/', '',$_POST['vnum']);
    $scap = preg_replace('/\s+/', '',$_POST['scap']);
    $rpd = preg_replace('/\s+/', '',$_POST['rpd']);
    $query = "insert into car (model,number,capacity,rent,agencyid) values('".$vmodel."', '".$vnum."','".$scap."','".$rpd."','".$_SESSION['user']."')";
    if ($conn->query($query) === TRUE) {
        echo "<script>alert('New Car Added');setTimeout(\"location.href = 'carListAgency.php';\",1);</script>";
      } else {
        echo "Error: " . $query . "<br>" . $conn->error;
      }
}
?>