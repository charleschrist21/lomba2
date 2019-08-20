<?php
require('db.php');

if(isset($_REQUEST['title'])){
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
    $query = "INSERT into `post` (title,location,category,photoBy,postBy,description,image) VALUES('$title','$location','$category','$photoBy','$postBy','$description','$targetName')";
    $result = mysqli_query($conn,$query);

    header("Location: index.php");  
}
?>