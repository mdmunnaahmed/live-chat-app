<?php
session_start();
if (isset($_SESSION['unique_id'])) {
    include "config.php";
    $outgoing_id = mysqli_real_escape_string($conn, $_POST['outgoing_id']);
    $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
    $outgoing = "";

    $sql = "SELECT * FROM messages WHERE (outgoing_msg_id = {$outgoing_id} AND incoming_msg_id = {$incoming_id}) OR (outgoing_msg_id = {$incoming_id} AND incoming_msg_id = {$outgoing_id}) ORDER BY msg_id";
    $query = mysqli_query($conn, $sql);
    $output = "";
    if (mysqli_num_rows($query) > 0) {
        while ($row = mysqli_fetch_assoc($query)) {
            if ($row['outgoing_msg_id'] === $outgoing_id) {
                $output .= '<li>
                <div class="user-profile msg-item outgoing-msg d-flex flex-wrap">
                    <div class="user-content">
                        <span class="msg">' . $row['msg'] . '</span>
                    </div>
                    <div class="user-thumb"><img src="assets/images/users/" alt="user"></div>
                </div>
            </li>';
            } else {
                $output .= '<li>
                <div class="user-profile msg-item incoming-msg d-flex flex-wrap">
                    <div class="user-thumb"><img src="assets/images/users/1.png" alt="user"></div>
                    <div class="user-content">
                        <span class="msg">' . $row['msg'] . '</span>
                    </div>
                </div>
            </li>';
            }
            echo $output;
        }
    }
} else {
    header("location: login.php");
}
