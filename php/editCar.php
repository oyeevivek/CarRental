<?php
include 'conn.php';
session_start();
if(!isset($_SESSION['user']) || $_SESSION['type'] != 'agency'){
    header("Location:../index.php");
}
if(isset($_POST['vmodel']) && isset($_POST['vnum']) && isset($_POST['scap']) && isset($_POST['rpd'])){
    $id = $_POST['id'];
    $vmodel = preg_replace('/\s+/', '',$_POST['vmodel']);
    $vnum = preg_replace('/\s+/', '',$_POST['vnum']);
    $scap = preg_replace('/\s+/', '',$_POST['scap']);
    $rpd = preg_replace('/\s+/', '',$_POST['rpd']);
    $query = "update car set model = '".$vmodel."', number = '".$vnum."', capacity = '".$scap."', rent = '".$rpd."' where id = '".$id."' ";
    if ($conn->query($query) === TRUE) {
        echo "<script>alert('Car Details Updated');setTimeout(\"location.href = 'carListAgency.php';\",1);</script>";
    } else {
        echo "Error: " . $query . "<br>" . $conn->error;
      }
}
?>