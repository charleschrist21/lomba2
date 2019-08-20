<?php
require('db.php');
$id = $_GET['id'];
$query = "DELETE from `admin` WHERE id='$id'";
$result = mysqli_query($conn,$query);
header('Location: index.php');

?>