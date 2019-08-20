<?php
require('db.php');

if(isset($_REQUEST['username'])){
    $id = stripslashes($_REQUEST['id']);
    $id = mysqli_real_escape_string($conn,$id);
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

    $query = "UPDATE `admin` SET fullName='$firstname $lastname', username='$username', email='$email', password='".md5($password)."', addBy='$addedby', image='$fileName' WHERE id='$id'";
    $result = mysqli_query($conn,$query);

    var_dump($query);
    header("Location: index.php"); 
}

?> 
