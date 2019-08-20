<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
        require('db.php');
        session_start();
        if(isset($_POST['username'])){
            $username = stripslashes($_REQUEST['username']);
            $username = mysqli_real_escape_string($conn,$username);
            $password = stripslashes($_REQUEST['password']);
            $password = mysqli_real_escape_string($conn,$password);

            $query = "SELECT * FROM `admin` WHERE username='$username' and password='".md5($password)."' ";
            $result = mysqli_query($conn,$query);

            $rows = mysqli_num_rows($result);

            if($rows == 1){
                $_SESSION['username'] = $username;
                header('Location: http://localhost:8888/sinauLks/admin/manage/admin/');
            }
            else{
                var_dump("salah");
            }
        }
    ?>
    <div class="div-login">
        <h1>Jepara</h1>
        <form method="post" class="form-login">
        <label for="username" class="label-login">Username</label> <br>
        <input type="text" name="username" id="" class="inp-login"> <br>
        <label for="password" class="label-login">Password</label> <br>
        <input type="password" name="password"  class="inp-login password"> <br>
        <input type="submit" name="submit" value="SIGN IN" id="" class="btn-login">
        </form>
    </div>
</body>
</html>