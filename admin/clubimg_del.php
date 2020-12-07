<?php
include("../app/database.php");
error_reporting(0);
session_start();
mysqli_query($link,"DELETE FROM clubimg WHERE id = '".$_GET['del_clubimg']."'");
header("location:clubsall.php");  
?>