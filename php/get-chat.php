<?php
session_start();
if (isset($_SESSION['unique_id'])) {
    include "config.php";
    $outgoing_id = mysqli_real_escape_string($conn, $_POST['outgoing_id']);
    $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
    $outgoing = "";

    $query = "SELECT * FROM messages WHERE (outgoing_msg_id = {$outgoing_id} AND incoming_msg_id = {$incoming_id}) OR (outgoing_msg_id = {$incoming_id} AND incoming_msg_id = {$outgoing_id}) ORDER BY msg_id DESC";
    $query = mysqli_query($conn, $query);
    if ($query = mysqli_fetch_assoc($query)) {
        while ($query) {
            $outgoing_msg = $query['outgoing_msg_id'];
            $incoming_msg = $query['incoming_msg_id'];
            
        }
    }
} else {
    header("location: login.php");
}
