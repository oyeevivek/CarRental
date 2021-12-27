<?php
session_start();
session_destroy();
echo "<script>alert('Logged Out');setTimeout(\"location.href = '../index.php';\",1);</script>";
?>