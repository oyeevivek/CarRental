<?php
include 'conn.php';
if(isset($_POST['email']) && isset($_POST['pass'])){
    $email = $_POST['email'];
    $pass = md5($_POST['pass']);
    $query = "select * from user where email = '".$email."' and pass = '".$pass."' ";
    $result = $conn->query($query);
    while($row = mysqli_fetch_array($result)){
        $rows[] = $row;
        foreach($rows as $row){ 
            session_start();
            $_SESSION["type"] = $row['type'];
        }        
    }
    if ($result->num_rows > 0) {
        $_SESSION["user"] = $email;
        if(isset($_SESSION["user"])){
            if($_SESSION["type"] == "customer"){
                echo "<script>alert('Login Successful');setTimeout(\"location.href = 'carListCustomer.php';\",1);</script>";
            }
            else if($_SESSION["type"] == "agency"){
                echo "<script>alert('Login Successful');setTimeout(\"location.href = 'carListAgency.php';\",1);</script>";
            }
        }else{
            echo "<script>alert('Login Failed');setTimeout(\"location.href = '../login.html';\",1);</script>";
        }
    } else {
        echo "<script>alert('Wrong Credential');setTimeout(\"location.href = '../login.html';\",1);</script>";
    }
}
else{
    echo "<script>alert('Please Enter Email and Password both');setTimeout(\"location.href = '../login.html';\",1);</script>";
}
?>