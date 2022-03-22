<?php
session_start();
if (isset($_SESSION['unique_id'])) {
    include "config.php";
    $outgoing_id = mysqli_real_escape_string($conn, $_POST['outgoing_id']);
    $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
    $msg = mysqli_real_escape_string($conn, $_POST['message']);

    if (!empty($msg)) {
        $query = mysqli_query($conn, "INSERT INTO messages (outgoing_msg_id, incoming_msg_id, msg) VALUES ({$outgoing_id}, {$incoming_id}, '{$msg}')");
    }
} else {
    header("location: login.php");
}