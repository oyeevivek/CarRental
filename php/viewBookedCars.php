<?php
function carList(){
    include 'conn.php';
    session_start(); 
    if(!isset($_SESSION['user']) || $_SESSION['type'] != 'agency'){
        header("Location:../index.php");
    }
    $user = $_SESSION["user"];
    $query = "select b.customer_id, c.model,c.number, c.capacity, c.rent,b.start_date,b.end_date from car as c left join booking as b on(c.id = b.car_id) where c.agencyid = '".$user."' and c.id in (select car_id from booking) ";
    $result = $conn->query($query);
    $list = "";
    while($row = mysqli_fetch_array($result)){
        $rows[] = $row;
        foreach($rows as $row){ 
            $customer_id = stripslashes($row['customer_id']);
            $model = stripslashes($row['model']);
            $number = stripcslashes($row['number']);
            $capacity = stripslashes($row['capacity']);
            $rent = $row['rent'];
            $start_date = $row['start_date'];
            $end_date = $row['end_date'];
        }
        $list .= "<tr><td>".$customer_id."</td><td>".$model."</td><td>".$number."</td><td>".$capacity."</td><td>".$rent."</td><td>".$start_date."</td><td>".$end_date."</td></tr>";
    }
    $list = "<table border = '1px' id='customers'><tr><th>Customer</th><th>Model</th><th>Number</th><th>Capacity</th><th>Rent</th><th>start date</th><th>end date</th></tr>".$list."</table>";
    echo htmlspecialchars_decode($list);
  }
?>

<html>
<head>
    <title>
        Car Listed
    </title>
   
    <!-- Add icon library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/table.css">
    <link rel="stylesheet" href="../css/main.css">
</head>
<body>
<a href="../index.php"><button class="btn"><i class="fa fa-home"></i> Home </button></a>

    <h1>Your Bookings</h1>

    <div id = "carListTable">
    <script type='text/javascript'>
        document.write("<?php carList()?>");
    </script>
    </div>
</body>
</html>