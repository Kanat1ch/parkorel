<?php
include("../app/database.php");
error_reporting(0);
session_start();
mysqli_query($link,"DELETE FROM services WHERE id = '".$_GET['del_service']."'");
header("location:servicesall.php");  
?>