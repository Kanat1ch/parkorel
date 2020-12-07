<?php
include("../app/database.php");
error_reporting(0);
session_start();
mysqli_query($link,"DELETE FROM postimg WHERE id = '".$_GET['del_postimg']."'");
header("location:postall.php");  
?>