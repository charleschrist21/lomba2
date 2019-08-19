<?php
$host = "localhost";
$username = "root";
$password = "";
$db = "lks";

$conn = mysqli_connect($host,$username,$password,$db);

if(!$conn){
    die ("failed to connect");
}
?>