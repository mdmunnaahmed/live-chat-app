<?php
session_start();
include_once "config.php";
$output = "";
$query = mysqli_query($conn, "SELECT * FROM users");
if (mysqli_num_rows($query) == 1) {
    $output .= "There is no user available to chat";
} elseif (mysqli_num_rows($query) > 0) {
    include "data.php";
}
echo $output;
