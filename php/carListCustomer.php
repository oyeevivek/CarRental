<?php
include 'conn.php';
session_start();
if(!isset($_SESSION['user']) || $_SESSION['type'] != 'customer'){
    header("Location:../index.php");
}
$availableList = "";
if(isset($_POST['edays']) && isset($_POST['sdate'])){
    $startdate = $_POST['sdate'];
    $days = $_POST['edays'];
    $enddate = date('Y-m-d', strtotime($startdate. ' + '.$days.' days'));
    $query = "select c.* from car as c where c.model not in (select c.model from car c left join booking r ON(c.id = r.car_id) where r.start_date <= '".$startdate."' and r.end_date > '".$startdate."' and r.end_date <= '".$enddate."' group by c.model UNION select c.model from car c left join booking r ON(c.id = r.car_id) where r.start_date > '".$startdate."' and r.start_date < '".$enddate."' and r.end_date >= '".$enddate."' group by c.model)";
    $result = $conn->query($query);
    $_SESSION['start_date'] = $startdate;
    $_SESSION['end_date'] = $enddate;
    while($row = mysqli_fetch_array($result)){
        $rows[] = $row;
        foreach($rows as $row){ 
            $id = $row['id'];
            $model = stripslashes($row['model']);
            $number = stripcslashes($row['number']);
            $capacity = stripslashes($row['capacity']);
            $rent = $row['rent'];
        }
        $details = $id."+".$model."+".$number."+".$capacity."+".$rent;
        $availableList .= "<tr><td><form action = 'bookCar.php' method = 'post'><input type = 'text' name = 'id' value = '".$id."' style = 'display:none'><input type = 'submit' name = 'submit' value = 'Rent Car'></form></td><td>".$model."</td><td>".$number."</td><td>".$capacity."</td><td>".$rent."</td></tr>";
    }
    $availableList = "<table border = '1px' id = 'customers' ><tr><th>Click to Book</th><th>Model</th><th>Number</th><th>Capacity</th><th>Rent</th></tr>".$availableList."</table>";
}
?>

<html>
<head>
    <title>
        Car Listed
    </title>
   
    <!-- Add icon library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="../js/addNewCar.js"></script>
    <script src="../js/formValidation.js"></script>
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/table.css">
</head>
<body>
<div class="container signin">
<a href="../index.php"><button class="btn"><i class="fa fa-home"></i> Home </button></a>
    <p> Hi! <?php echo $_SESSION["user"] ?></p>
    <a href = "logout.php"> <button> Logout</button></a>
    <br></br>
    <a href = "bookings.php"> <button> My Bookings</button></a>
    <br></br>
    <h1>Check Car Availability</h1>
    <br></br>
</div>
    <form id = "availableCar" name="availableCar" action="carListCustomer.php" method="post" onsubmit="return availableCarForm()">
        <div class="container">
            <label for="edays">Enter Days:</label><br>
            <input type="text" id="edays" name="edays"><br>
            <label for="sdate">Start Date:</label><br>
            <input type="date" id="sdate" name="sdate"><br><br>
            <input type="submit" value="Check Availability" class="registerbtn">
        </div>
    </form>
    <br></br>
        <div id = "availableCarListTable" >
            <script type='text/javascript'>
                document.write("<?php echo $availableList ?>");
            </script>
        </div>
</body>
</html>
