<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div>
    <?php include('../sidebar.php'); require('db.php'); ?>
    </div>
    <div class="content">
        <div class="allpost">
            <h1 class="allpost-header">All Post</h1>
            <div class="allpost-icon"></div>
            <p class="allpost-total">24 Post</p>
            <form method="get">
                <input type="text" name="search" class="inp-search">
                <input type="submit" name="submit" class="btn-search" value="Search">
            </form>
            <table class="allpost-table">
                <thead >
                    <tr>
                        <td class="tbody-id">ID</td>
                        <td class="tbody-image">Image</td>
                        <td class="tbody-title">Full Name</td>
                        <td class="tbody-category">Username</td>
                        <td class="tbody-location">Email</td>
                        <td class="tbody-photoby"></td>
                        <td class="tbody-postby-title">Added By</td>
                        <td class="tbody-action">Action</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        if(isset($_GET['search'])){
                            $cari =$_GET['search'];
                            $query = "SELECT * FROM admin WHERE fullName like '%".$cari."%' ";
                            $result = mysqli_query($conn,$query);
                            if(mysqli_num_rows($result) > 0){
                                while($row = mysqli_fetch_array($result)){
                                    $id = $row["id"];
                                    $image = 'image/'.  $row['image'];
                                    echo "<tr>";
                                        echo "<td class='tbody-id'>" .$row['id']. "</td>";
                                        echo "<td class='tbody-image'>" . "<img class='image-user' src='$image'>" . "</td>";
                                        echo "<td class='tbody-title'>" .$row['fullName']. "</td>";
                                        echo "<td class='tbody-category'>" ."@" .$row['username']. "</td>";
                                        echo "<td class='tbody-location'>" .$row['email']. "</td>";
                                        echo "<td class='tbody-postby'>" .$row['addBy']. "</td>";
                                        echo "<td class='tbody-postby'>" ."". "</td>";
                                        echo "<td class='tbody-action'>";
                                        echo "<a href=' ? id=$id' class='btn-edit'>"."Edit"."</a>";
                                        echo "<a href=' delete.php required?id=$id' onclick = \"return confirm('are you sure to delete?')\" class='btn-delete'>"."Delete"."</a>";
                                        echo "</td>";
                                    echo "</tr>";
                                }
                            }
                        }else{
                        $query = "SELECT * FROM admin";
                        $result = mysqli_query($conn,$query);
                        if(mysqli_num_rows($result) > 1){
                            while($row = mysqli_fetch_array($result)){
                                $id = $row["id"];
                                $image = 'image/'.  $row['image'];
                                echo "<tr>";
                                echo "<td class='tbody-id'>" .$row['id']. "</td>";
                                echo "<td class='tbody-image'>" . "<img class='image-user' src='$image'>" . "</td>";
                                echo "<td class='tbody-title'>" .$row['fullName']. "</td>";
                                echo "<td class='tbody-category'>" . "@" .$row['username']. "</td>";
                                echo "<td class='tbody-location'>" .$row['email']. "</td>";
                                echo "<td class='tbody-postby'>" ."". "</td>";
                                echo "<td class='tbody-postby'>" .$row['addBy']. "</td>";
                                echo "<td class='tbody-action'>";
                                echo "<a href=' ? id=$id' class='btn-edit'>"."Edit"."</a>";
                                echo "<a href=' delete.php?id=$id' onclick = \"return confirm('are you sure to delete?')\" class='btn-delete'>"."Delete"."</a>";
                                echo "</td>";
                            echo "</tr>";
                            }
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <div class="form-add-post">
            <p class="text-add-post">Add Admin</p>
            <form action="addAdmin.php" method="post" enctype="multipart/form-data">
                <div class="add-title">
                    <label class="label-input" for="firstname">First Name</label><br>
                    <input class="input-form" type="text" name="firstname" id="" required>
                </div>
                <div class="add-location">
                    <label class="label-input" for="lastname">Last Name</label><br>
                    <input class="input-form" type="text" name="lastname" id="" required>
                </div>
                <div class="add-image">
                    <input class="input-image" type="file" name="image" id="">
                </div>
                <div class="add-category">
                    <label class="label-input" for="username">Username</label> <br>
                    <input type="text" name="username" id="" class="input-form" required>
                </div>
                <div class="add-photoby">
                    <label class="label-input" for="email">Email</label><br>
                    <input class="input-form" type="email" name="email" id="" required>
                </div>
                <div class="add-description">
                    <label class="label-input" for="password">Password</label> <br>
                    <input type="password" name="password" class="input-form" required>
                </div>
                <input class="btn-submit" type="submit" name="submit" value="ADD">
            </form>
        </div>
        <div class="form-edit-post">
            <p class="text-edit-post">Edit Admin</p>
            <form action="editAdmin.php" method="post" enctype="multipart/form-data">
                <div class="edit-id">
                    <label class="label-input" for="id">ID</label><br>
                    <input class="input-form" type="number" name="id" value="<?php echo $_GET['id']; ?>" required> 
                </div>
                <div class="edit-title">
                    <label class="label-input" for="username">Username</label> <br>
                    <input class="input-form" type="text" name="username" required>
                </div>
                <div class="edit-location">
                    <label class="label-input" for="email">Email</label> <br>
                    <input class="input-form" type="email" name="email" required>
                </div>
                <div class="edit-image">
                    <input class="input-image" type="file" name="image">
                </div>
                <div class="add-category">
                    <label class="label-input" for="fullname">First Name</label> <br>
                    <input class="input-form" type="text" name="fullname"  required>
                </div>
                <div class="add-photoby">
                    <label class="label-input" for="lastname">Last Name</label> <br>
                    <input class="input-form" type="text" name="lastname" required>
                </div>
                <div class="add-description">
                    <label class="label-input" for="password">Password</label> <br>
                    <input type="password" name="password" class="input-form" required>
                </div>
                <input class="btn-submit" type="submit" name="submit" value="Edit">
            </form>
        </div>
    </div>
    
</body>
</html>