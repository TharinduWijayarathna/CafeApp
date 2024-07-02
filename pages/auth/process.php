<?php
require_once "./../../config.php";

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_GET['register'])) {
   // Register
    $email = $_POST['email'];
    $firstName = $_POST['firstname'];
    $lastName = $_POST['lastname'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO user (email, first_name, last_name, username, password) VALUES ('$email', '$firstName', '$lastName', '$username', '$password')";

    try {
        $database->query($sql);

        $_SESSION['message'] = "User registration successfully. You can login now!";
        $_SESSION['message_type'] = "success";

        header("Location: /pages/auth/login.php");
    } catch (Exception $e) {
        $_SESSION['message'] = $e->getMessage();
        $_SESSION['message_type'] = "danger";

        header("Location: /pages/auth/register.php");
    }
}


if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_GET['login'])) {
   $username = $_POST['username'];
   $password = $_POST['password'];

   try {
        $sql = "SELECT * FROM user WHERE username = '$username'";
        $result = $database->query($sql);

        $row = $result->fetch_row();

        $hashedPassword = $row[5];

        $isPasswordVerified = password_verify($password, $hashedPassword);

        if($isPasswordVerified) {
                $_SESSION['username'] = $username;

                header("Location: /pages/dashboard");
        } else {
                $_SESSION['message'] = "Login failed.";
                $_SESSION['message_type'] = "danger";

                header("Location: /pages/auth/login.php");
        }
   } catch (Exception $e) {
       $_SESSION['message'] = $e->getMessage();
       $_SESSION['message_type'] = "danger";

       header("Location: /pages/auth/login.php");
   }
}

if (isset($_GET['logout'])) {
   unset($_SESSION['username']);
   header("Location: /pages/auth/login.php");
}

