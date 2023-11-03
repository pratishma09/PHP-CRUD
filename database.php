<?php
$server="localhost";
$username="root";
$password="";
$database="notesapp";

//connection
$conn=mysqli_connect($server,$username,$password,$database);

if(!$conn){
    die("Failed to connect:".mysqli_connect_error());
}
?>