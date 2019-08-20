<?php
require('db.php');

if(isset($_REQUEST['username'])){
    $firstname = stripslashes($_REQUEST['firstname']);
    $firstname = mysqli_real_escape_string($conn,$firstname);
    $lastname = stripslashes($_REQUEST['lastname']);
    $lastname = mysqli_real_escape_string($conn,$lastname);
    $email = stripslashes($_REQUEST['email']);
    $email = mysqli_real_escape_string($conn,$email);
    $username = stripslashes($_REQUEST['username']);
    $username = mysqli_real_escape_string($conn,$username);
    $password = stripslashes($_REQUEST['password']);
    $password = mysqli_real_escape_string($conn,$password);

    $addedby = $_SESSION['username'];

    $fileDir = "image/";
    $fileName = trim($firstname . md5($password) . ".jpg");
    $fileTarget = $fileDir . $fileName;

    move_uploaded_file($_FILES["image"]["tmp_name"], $fileTarget);

    $query = "INSERT into `admin` (fullName,username,password,email,addBy,image) VALUES('$firstname $lastname','$username','".md5($password)."','$email','$addedby','$fileName')";
    $result = mysqli_query($conn,$query);

    var_dump($query);
    header("Location: index.php");
}
?> 