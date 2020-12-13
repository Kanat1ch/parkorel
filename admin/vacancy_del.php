<?php
include("../core/database.php");
error_reporting(0);
session_start();
mysqli_query($link,"DELETE FROM vacancy WHERE id = '".$_GET['del_vacancy']."'");
header("location:vacancies.php");  
?>