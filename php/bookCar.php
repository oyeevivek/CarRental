<?php
include 'conn.php';
session_start();
if(!isset($_SESSION['user']) || $_SESSION['type'] != 'customer'){
  header("Location:../login.html");
}
else if(isset($_POST['id']) && isset($_SESSION['start_date']) && isset($_SESSION['end_date'])){
    $car_id = $_POST['id'];
    $user = $_SESSION['user'];
    $start_date = $_SESSION['start_date'];
    $end_date = $_SESSION['end_date'];
    $query = "insert into booking (customer_id, car_id, start_date, end_date) values('".$user."', '".$car_id."','".$start_date."','".$end_date."')";
    if ($conn->query($query) === TRUE) {
        echo "<script>alert('Booking Successful');setTimeout(\"location.href = 'carListCustomer.php';\",1);</script>";
      } else {
        echo "Error: " . $query . "<br>" . $conn->error;
      }
}
else{
  header("Location:carListCustomer.php");
}
?>