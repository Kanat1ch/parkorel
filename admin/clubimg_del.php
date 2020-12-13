<?php
include("../core/database.php");
error_reporting(0);
session_start();
$cid=$_SESSION['ci'];
mysqli_query($link,"DELETE FROM clubimg WHERE id = '".$_GET['del_clubimg']."'");
header("location:club_upload.php?club_id=$cid");  
?>