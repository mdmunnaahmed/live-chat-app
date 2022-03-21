<?php


while ($row = mysqli_fetch_assoc($query)) {
    $output .= '
    <li>
    <a href="chat.php?user_id=' . $row['unique_id'] . '" class="user-profile-wrapper d-flex flex-wrap justify-content-between align-items-center">
        <div class="user-profile msg-profile d-flex flex-wrap">
            <div class="user-thumb"><img src="assets/images/users/' . $row['img'] . '" alt="user"></div>
            <div class="user-content">
                <h6 class="name"> ' . $row['fname'] . " " . $row['lname'] . '</h6>
                <span class="msg">This is the last message by the user.</span>
            </div>
        </div>
        <div class="active-dot online"></div>
    </a>
</li>
    ';
}
