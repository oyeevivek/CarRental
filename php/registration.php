<?php
include 'conn.php';
$email = $_POST['email'];
$pass = md5($_POST['pass']);

if(isset($email)){
  $query = "select * from user where email = '".$email."' ";
  $result = $conn->query($query);
  $rowcount = mysqli_num_rows($result);
}

if($rowcount > 0){
  echo "<script>alert('Email Id already existed');setTimeout(\"location.href = '../registration.html';\",1);</script>";
}
else if(isset($_POST['fname'])){
    $firstname = $_POST['fname'];
    $lastname = $_POST['lname'];
    $query = "insert into user (name,email,pass,type) values('".$firstname."' '".$lastname."', '".$email."','".$pass."','customer')";
    if ($conn->query($query) === TRUE) {
        echo "<script>alert('Registration Successful');setTimeout(\"location.href = '../login.html';\",1);</script>";
      } else {
        echo "<script>alert('Registration Failed');setTimeout(\"location.href = '../registration.html';\",1);</script>";
      }
}
else if(isset($_POST['aname'])){
    $agencyname = $_POST['aname'];
    $query = "insert into user (name,email,pass,type) values('".$agencyname."', '".$email."','".$pass."','agency')";
    if ($conn->query($query) === TRUE) {
        echo "New record created successfully";
        echo "<script>alert('Registration Successful');setTimeout(\"location.href = '../login.html';\",1);</script>";
      } else {
        echo "<script>alert('Registration Failed');setTimeout(\"location.href = '../registration.html';\",1);</script>";
    }
}
?>