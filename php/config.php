<?php
$conn = mysqli_connect("127.0.0.1", "root", "", "chat");
if ($conn) {
    echo "Database Connected";
} else {
    echo "Database Error";
}
