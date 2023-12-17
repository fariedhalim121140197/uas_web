<?php
    session_start();
    var_dump($_SESSION);
    include 'koneksi.php';
    if(isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $login = mysqli_query($conn, "SELECT * from login WHERE username = '$username' AND password = '$password'");
        $check = mysqli_fetch_array($login);
        if(is_array($check)) {
                $_SESSION['login'] = true;
                header("Location: crud.php");
                echo 'Berhasil Login!';
                exit;
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST" action="session.php">
        <div class="ic">
            <label for="username">Username</label> <br>
            <input id="username" class="is" type="username" name="username" />
        </div>
        <div class="ic">
            <label for="password">Password</label> <br>
            <input id="password" class="is1" type="password" name="password" />
        </div>
        <input type="submit" class="btn1" name="login" value="login" >
    </form>
</body>
</html>