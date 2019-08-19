<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
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
                        <td class="tbody-title">Title</td>
                        <td class="tbody-category">Category</td>
                        <td class="tbody-location">Location</td>
                        <td class="tbody-photoby">Photo By</td>
                        <td class="tbody-postby-title">Post By</td>
                        <td class="tbody-action">Action</td>
                    </tr>
                </thead>
                <tbody>
                    <?php

                        $query = "SELECT * FROM post";
                        $result = mysqli_query($conn,$query);
                        if(mysqli_num_rows($result) > 1){
                            while($row = mysqli_fetch_array($result)){
                                echo "<tr>";
                                    echo "<td class='tbody-id'>" .$row['id']. "</td>";
                                    echo "<td class='tbody-image'>" ."a". "</td>";
                                    echo "<td class='tbody-title'>" .$row['title']. "</td>";
                                    echo "<td class='tbody-category'>" .$row['category']. "</td>";
                                    echo "<td class='tbody-location'>" .$row['location']. "</td>";
                                    echo "<td class='tbody-photoby'>" .$row['photoBy']. "</td>";
                                    echo "<td class='tbody-postby'>" .$row['postBy']. "</td>";
                                    echo "<td class='tbody-action'>"."a"."b"."</td>";
                                echo "</tr>";
                            }
                        }
                    ?>
                </tbody>
            </table>
        </div>
        <div class="form-add-post">
            <p class="text-add-post">Add Post</p>
            <form action="">
                <div class="add-title">
                    <label class="label-input" for="title">Title</label><br>
                    <input class="input-form" type="text" name="title" id="">
                </div>
                <div class="add-location">
                    <label class="label-input" for="location">Location</label><br>
                    <input class="input-form" type="text" name="title" id="">
                </div>
                <div class="add-image">
                    <input class="input-image" type="file" name="image" id="">
                </div>
                <div class="add-category">
                    <label class="label-input" for="category">Category</label> <br>
                    <select class="input-form" name="category" id="">
                        <option value="Lomba Anak">Lomba Anak</option>
                        <option value="Lomba Umum">Lomba Umum</option>
                    </select>
                </div>
                <div class="add-photoby">
                    <label class="label-input" for="photoby">Photo By</label><br>
                    <input class="input-form" type="text" name="photoby" id="">
                </div>
                <div class="add-description">
                    <label class="label-input" for="description">Description</label>
                    <textarea class="textarea-form" name="description" id="" cols="30" rows="5"></textarea>
                </div>
                <input class="btn-submit" type="submit" name="submit" value="ADD">
            </form>
        </div>
        <div class="form-edit-post">
            <p class="text-edit-post">Edit Post</p>
            <form action="">
                <div class="edit-id">
                    <label class="label-input" for="id">ID</label> <br>
                    <input class="input-form" type="text" name="id"> 
                </div>
                <div class="edit-title">
                    <label class="label-input" for="title">Title</label> <br>
                    <input class="input-form" type="text" name="title">
                </div>
                <div class="edit-location">
                    <label class="label-input" for="location">Location</label> <br>
                    <input class="input-form" type="text" name="location">
                </div>
                <div class="edit-image">
                    <input class="input-image" type="file" name="image">
                </div>
                <div class="add-category">
                    <label class="label-input" for="category">Category</label> <br>
                    <select class="input-form" name="category" id="">
                        <option value="Lomba Anak">Lomba Anak</option>
                        <option value="Lomba Umum">Lomba Umum</option>
                    </select>
                </div>
                <div class="add-photoby">
                    <label class="label-input" for="photoby">Photo By</label> <br>
                    <input class="input-form" type="text" name="photoby">
                </div>
                <div class="add-description">
                    <label class="label-input" for="description">Description</label> <br>
                    <textarea class="textarea-form" name="description"  cols="30" rows="5"></textarea>
                </div>
                <input class="btn-submit" type="submit" name="submit" value="Edit">
            </form>
        </div>
    </div>
    
</body>
</html>