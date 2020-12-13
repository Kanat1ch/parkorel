<?php
include("../core/database.php");
error_reporting(0);
session_start();
mysqli_query($link,"DELETE FROM clubs WHERE id = '".$_GET['del_club']."'");
header("location:clubs.php");  
?>