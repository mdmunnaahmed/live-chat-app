<?php
session_start();
if (!isset($_SESSION['unique_id'])) {
    header("location: login.php");
}
?>

<?php
include_once "header.php"

?>

<body>
    <!-- Overlay -->
    <div class="overlay"></div>

    <!-- Profile -->
    <div class="container">
        <div class="card custom--card wrapper">
            <div class="card-header">
                <?php
                include_once "php/config.php";
                $query = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
                if (mysqli_num_rows($query) > 0) {
                    $row = mysqli_fetch_assoc($query);
                }
                ?>
                <div class="d-flex flex-wrap align-items-center justify-content-between">
                    <div class="user-profile d-flex flex-wrap">
                        <div class="user-thumb"><img src="assets/images/users/1.png" alt="user"></div>
                        <div class="user-content">
                            <h6 class="name"><?php echo $row['fname'] . " " . $row['lname']; ?></h6>
                            <span class="status text--success"><?php echo $row['status'] ?></span>
                        </div>
                    </div>
                    <a href="#0" class="btn btn--danger btn--sm"></a>
                </div>
            </div>
            <div class="card-body">
                <form action="#" class="search-wrapper mb-3">
                    <div class="input-group">
                        <input type="text" class="form-control form--control" placeholder="Search chats">
                        <button class="input-group-text" type="submit"><i class="las la-search"></i></button>
                    </div>
                </form>
                <ul class="chat-list">
                    <li>
                        <div class="user-profile-wrapper d-flex flex-wrap justify-content-between align-items-center">
                            <div class="user-profile msg-profile d-flex flex-wrap">
                                <div class="user-thumb"><img src="assets/images/users/1.png" alt="user"></div>
                                <div class="user-content">
                                    <h6 class="name">Munna Ahmed</h6>
                                    <span class="msg">This is the last message by the user.</span>
                                </div>
                            </div>
                            <div class="active-dot online"></div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Profile -->

    <!-- jQuery library -->
    <script src="assets/js/lib/jquery-3.6.0.min.js"></script>

    <!-- Bootstrap 5 js -->
    <script src="assets/js/lib/bootstrap.min.js"></script>

    <!-- Pluglin Link -->
    <script src="assets/js/lib/slick.min.js"></script>

    <!-- Main js -->
    <script src="assets/js/main.js"></script>
</body>

</html>