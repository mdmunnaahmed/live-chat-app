<?php
include_once "config.php";
$searchTerm = mysqli_real_escape_string($conn, $_POST['searchTerm']);
$query = mysqli_query($conn, "SELECT * FROM users WHERE fname LIKE '%{$searchTerm}%' OR lname LIKE '%{$searchTerm}%' ");
$output = "";
if (mysqli_num_rows($query) > 0) {
    include "data.php";
} else {
    $output .= "No user Found on your Search";
}
echo $output;
