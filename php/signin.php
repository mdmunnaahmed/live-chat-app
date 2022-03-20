<?php
session_start();
@include_once "config.php";

$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

if (!empty($email) && !empty($password)) {
    $query = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}' AND password = '{$password}'");
    if (mysqli_num_rows($query) > 0) {
        $row = mysqli_fetch_assoc($query);
        $_SESSION['unique_id'] = $row['unique_id'];
        echo "Success";
    } else {
        echo "Email or Password is Incorrect !!!";
    }
} else {
    echo "All Fields are Required !!!";
}
