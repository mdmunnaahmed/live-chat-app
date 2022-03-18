<?php
include_once "config.php";

$fname = mysqli_real_escape_string($conn, $_POST['fname']);
$lname = mysqli_real_escape_string($conn, $_POST['lname']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$profile_pic = mysqli_real_escape_string($conn, $_POST['profile-pic']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

if (!empty($fname) && !empty($lname) && !empty($email) && !empty($profile_pic) && !empty($password)) {
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $query = mysqli_query($conn, "SELECT email from chat WHERE email = '{$email}'");
        if (mysqli_num_rows($query) > 0) {
            echo "$email - already exists";
        } else {
            if (isset($_FILES['profile-pic'])) {
                $img_name = $_FILES['profile-pic']['name'];
                $img_name = $_FILES['profile-pic']['type'];
                $tmp_name = $_FILES['profile-pic']['tmp_name'];

                $img_explode = explode(".", $img_name);
                $img_ext = end($img_explode);

                $extensions = ['png', 'jpg', 'jpeg'];
                if (in_array($img_ext, $extensions) === true) {
                    $time = time();
                    $new_img_name = $time . $img_name;
                    if (move_uploaded_file($tmp_name, "assets/images/users" . $new_img_name)) {
                        $status = "active now";
                        $rand_id = rand(time(), 10000000);
                        $query2 = mysqli_query($conn, "INSERT INTO users (unique_id, fname, lname, email, img, password, status) VALUES({$rand_id}, '{$fname}','{$lname}','{$email}','{$new_img_name}','{$password}','{$status}')");
                        if ($query2) {
                            $query3 = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
                            if (mysqli_num_rows($query3) > 0) {
                                $row = mysqli_fetch_assoc($query3);
                                $_SESSION['unique_id'] = $row['unique_id'];
                                echo "Success";
                            }
                        } else {
                            echo "Something Went Wrong";
                        }
                    }
                } else {
                    echo "Please upload a valid image";
                }
            } else {
                echo "Please Upload your Profile Photo";
            }
        }
    } else {
        echo "$email email not valid !!";
    }
} else {
    echo "All Fields are required !!!";
}
