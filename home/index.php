<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php 
    require('db.php');
    include('header.php');
    ?>
    <div class="content">
        <img src="1.jpg" class="img-home">
         <div class="menu-by-category">
            <p class="title-menu">Lomba Umum</p>
            <a href="lombaUmum.php" class="menu-load-all">+ Load All</a>
         </div>

         <div class="menu-card">
         <?php
            $query = "SELECT * FROM `post` WHERE category='Lomba Umum' LIMIT 3";
            $result = mysqli_query($conn,$query);
            
           

            if(mysqli_num_rows($result) == 3){
                while($row= mysqli_fetch_array($result)){
                    $image = "http://localhost:8888/sinauLks/admin/manage/post/image/" . $row["image"];
                    echo "<div class='card-view'>";
                        echo "<img src='$image' class='img-card'>";
                        echo "<p class='title-card'>".$row['title']."</p>";
                        echo "<p class='location-card'>".$row['location']."</p>";
                        echo "<p class='category-card'>".$row['category']."</p>";
                        echo "<p class='postby-card'>".$row['postBy']."</p>";
                        echo "<p class='photoby-card'>".$row['photoBy']."</p>";
                        echo "<a href='#' class='btn-view-more'>" . "View More" . "</a>";   
                    echo "</div>";
                }
            }
         ?>
         </div>
         <div class="menu-by">
            <p class="title-menu">Lomba Anak</p>
            <a href="lombaAnak.php" class="menu-load-all">+ Load All</a>
         </div>

         <div class="menu-card">
         <?php
            $query = "SELECT * FROM `post` WHERE category='Lomba Anak' LIMIT 3";
            $result = mysqli_query($conn,$query);
            
           

            if(mysqli_num_rows($result) == 3){
                while($row= mysqli_fetch_array($result)){
                    $image = "http://localhost:8888/sinauLks/admin/manage/post/image/" . $row["image"];
                    echo "<div class='card-view'>";
                        echo "<img src='$image' class='img-card'>";
                        echo "<p class='title-card'>".$row['title']."</p>";
                        echo "<p class='location-card'>".$row['location']."</p>";
                        echo "<p class='category-card'>".$row['category']."</p>";
                        echo "<p class='postby-card'>".$row['postBy']."</p>";
                        echo "<p class='photoby-card'>".$row['photoBy']."</p>";
                        echo "<a href='#' class='btn-view-more'>" . "View More" . "</a>";   
                    echo "</div>";
                }
            }
         ?>
         </div>
    </div>
    <div>
        <?php include('footer.php'); ?>
    </div>
</body>
</html>