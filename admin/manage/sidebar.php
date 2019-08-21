<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="http://localhost:8888/sinauLks/admin/manage/sidebar.css">
</head>
<body>
    <?php
        require('db.php');
        require('auth.php');

        $username = $_SESSION['username'];

        $query = "SELECT * FROM `admin` WHERE username='$username' ";
        $result = mysqli_query($conn,$query);

        $rows = mysqli_fetch_array($result);


    ?>
    <div class="sidebar">
        <div class="user-information">
            <img src="http://localhost:8888/sinauLks/admin/manage/admin/image/<?php echo $rows['image']; ?>" class="user-information-image">
            <p class="user-information-username"><?php echo $username; ?></p>
            <div class="user-information-online"></div>
            <div class="user-information-admin">admin</div>
        </div>
        <div class="sidebar-date">
            <p class="date-day"><?php echo date('l'); ?></p>
            <p class="date-month"><?php echo date('m M'); ?></p>
            <p class="date-year"><?php echo date('Y') ?></p>
        </div>
        <div class="sidebar-menu">
            <p class="menu-text">Menu</p>
            <a href="http://localhost:8888/sinauLks/admin/manage/post/index.php" class="btn-post">POSTINGAN</a>
            <a href="http://localhost:8888/sinauLks/admin/manage/admin/index.php" class="btn-admin">ADMIN</a>
        </div>  
        <div class="sidebar-logout">
            <a href="" class="btn-logout">Log Out</a>
        </div>
    </div>
</body>
</html>