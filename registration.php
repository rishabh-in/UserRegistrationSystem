<?php include('server.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <title>Registration</title>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>Register</h2>
        </div>
        <form action='registration.php' method="post">

            <?php include('errors.php'); ?>

            <div class='input-form'>
                <label for="username">Username</label>
                <input type="text" name="username" required>
            </div>

            <div class='input-form'>
                <label for="email">Email</label>
                <input type="email" name="email" required>
            </div>

            <div class='input-form'>
                <label for="password">Password</label>
                <input type="password" name="password" required>
            </div>

            <div class='input-form'>
                <label for="confirm_password">Confirm Password</label>
                <input type="password" name="confirm_password" required>
            </div>

            <div class='input-form-btn'>
                <button type="submit" name='register_user'>Submit</button>
            </div>

            <p>Already a User<a href="login.php"><strong>Login</strong></a></p>

        </form>
    </div>
</body>
</html>