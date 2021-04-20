<?php 

session_start();

// initialising variables

$username = '';
$email = '';

$errors = array();

// connect to database

$db = mysqli_connect('localhost', 'root', '', 'practice');
if (!$db) {
        die("Connection failed: " . mysqli_connect_error());
    }


// Register user
if(isset($_POST['register_user'])) {

    $username = mysqli_real_escape_string($db, $_POST['username']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password_1 = mysqli_real_escape_string($db, $_POST['password']);
    $password_2 = mysqli_real_escape_string($db, $_POST['confirm_password']);

    // form validation

    if(empty($username)) {
        array_push($errors, "username is required");
    }
    if(empty($email)) {
        array_push($errors, "email is required");
    }
    if(empty($password_1 || $password_2)) {
        array_push($errors, "password is required");
    }
    if($password_1 != $password_2) {
        array_push($errors, "Passwords needs to be same");
    }

    // check db for existing user with username or email

    $user_check_query = "SELECT * FROM student where Username = '$username' or Email = '$email' LIMIT 1";

    $result = mysqli_query($db, $user_check_query);

    $user = mysqli_fetch_assoc($result);        // To convert the result into associative array(key=>value)

    if($user) {
        if($user['Username'] === $username) {
            array_push($errors, "Username already exists");
        }
        if($user['Email'] === $email) {
            array_push($errors, "Email already exists");
        }
    }

    // Register the user if no errors were encountered

    if(count($errors) == 0) {
        $password = md5($password_1); // This will encrypt passpord

        $query = "INSERT INTO student(Username, Email, Password) VALUES ('$username','$email','$password')";

        mysqli_query($db,$query);
        $_SESSION['Username'] = $username;

        $_SESSION['success'] = "You are logged in";

        header('location: index.php');
    }
}

// Login User

if(isset($_POST['login_user'])) {
    
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db,$_POST['password']);

    if(empty($username)){
        array_push($errors, "Username is required");
    }
    if(empty($password)) {
        array_push($errors, "Password is required");
    }

    if(count($errors) == 0) {
        $password = md5($password);

        $query = "SELECT * FROM student WHERE Username ='$username' AND Password = '$password' ";
        
        $result = mysqli_query($db, $query);

        if(mysqli_num_rows($result) == 1) {

            $_SESSION['username'] = $username;

            $_SESSION['success'] = 'Logged in successfully';

            header('location: index.php');
        }
        else {
            array_push($errors, "wrong username and password combination, try again");
        }
    }
  }
  
?>