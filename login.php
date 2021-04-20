<?php include('server.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <title>Login</title>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>Login</h2>
        </div>
        <form method="post" action='login.php'>

            <?php include('errors.php'); ?>

            <div class='input-form'>
                <label for="username">Username</label>
                <input type="text" name="username" >
            </div>

            <div class='input-form'>
                <label for="password">Password</label>
                <input type="password" name="password" >
            </div>

            <div class='input-form'>
                <button type="submit" name="login_user">Log in</button>
            </div>

            <p>Not a User<a href="registration.php"><strong> Register here</strong></a></p>

        </form>
    </div>
</body>
</html>