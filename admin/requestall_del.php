<?php
include("../core/database.php");
error_reporting(0);
session_start();
mysqli_query($link,"DELETE FROM requests ");
header("location:requests.php");  
?>