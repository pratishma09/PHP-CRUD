<?php
include"./database.php";
$id=$_GET["id"];
$deleteQuery= "DELETE FROM `notes` WHERE `id`='$id'";
$res=mysqli_query( $conn, $deleteQuery );
header("location:./index.php");
?>