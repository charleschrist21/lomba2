<?php
require('db.php');

if(isset($_REQUEST['id'])){
    $id = stripslashes($_REQUEST["id"]);
    $id = mysqli_real_escape_string($conn,$id);
    $title = stripslashes($_REQUEST["title"]);
    $title = mysqli_real_escape_string($conn,$title);
    $location = stripslashes($_REQUEST["location"]);
    $location = mysqli_real_escape_string($conn,$location);
    $category = stripslashes($_REQUEST["category"]);
    $category = mysqli_real_escape_string($conn,$category);
    $photoBy = stripslashes($_REQUEST["photoby"]);
    $photoBy = mysqli_real_escape_string($conn,$photoBy);
    $description = stripslashes($_REQUEST["description"]);
    $description = mysqli_real_escape_string($conn,$description);

    $targetDir = "image/";
    $targetName = trim($title .md5($title). ".jpg");
    $targetFile = $targetDir . $targetName;

    $postBy = $_SESSION['username'];

    move_uploaded_file($_FILES["image"]["tmp_name"],$targetFile);
    $query = "UPDATE `post` SET title='$title', location='$location', category='$category', photoBy='$photoBy', postBy='$postBy', description='$description', image='$targetName' WHERE id='$id' ";
    $result = mysqli_query($conn,$query);

    var_dump($query);

    header("Location: index.php");  
}
?>