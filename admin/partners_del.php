<?php
include("../app/database.php");
error_reporting(0);
session_start();
mysqli_query($link,"DELETE FROM partners WHERE id = '".$_GET['del_partner']."'");
header("location:partnersall.php");  
?>