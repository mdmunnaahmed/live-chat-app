<?php
session_start();
if (!isset($_SESSION['unique_id'])) {
    header("location: login.php");
}
include_once "php/config.php";
$user_id = mysqli_real_escape_string($conn, $_GET['user_id']);
$query = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$user_id}");
if (mysqli_num_rows($query) > 0) {
    $row = mysqli_fetch_assoc($query);
} else {
    // header("location: profile.php");
}
?>

<?php include_once "header.php" ?>

<body>
    <!-- Overlay -->
    <div class="overlay"></div>

    <!-- Profile -->
    <div class="container">
        <div class="card custom--card wrapper">
            <div class="card-header">
                <div class="d-flex flex-wrap align-items-center justify-content-between">
                    <div class="user-profile d-flex flex-wrap">
                        <div class="user-thumb"><img src="assets/images/users/<?php echo $row['img'] ?>" alt="user"></div>
                        <div class="user-content">
                            <h6 class="name"><?php echo $row['fname'] . " " . $row['lname']; ?></h6>
                            <span class="status"><?php echo $row['status'] ?></span>
                        </div>
                    </div>
                    <a href="profile.php" class="btn btn--danger btn--sm"><i class="las la-undo"></i></a>
                </div>
            </div>
            <div class="card-body">
                <ul class="chat-list">
                    

                </ul>
            </div>
            <div class="card-footer">
                <form action="#" class="msg-send-form" method="POST">
                    <div class="input-group">
                        <input type="hidden" name="outgoing_id" value="<?php echo $_SESSION['unique_id'] ?>">
                        <input type="hidden" name="incoming_id" value="<?php echo $user_id ?>">

                        <input name="message" type="text" class="form-control form--control">
                        <button class="input-group-text btn btn--base btn--sm" type="submit"><i class="fas fa-paper-plane"></i></button>
                    </div>
                </form>
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

    <script>
        const form = document.querySelector('.msg-send-form'),
            inutFeild = document.querySelector('.msg-send-form input'),
            sendBtn = document.querySelector('.msg-send-form button'),
            chatBox = document.querySelector('.chat-list');
        form.onsubmit = (e) => {
            e.preventDefault();
        }

        sendBtn.onclick = () => {
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "php/insert-chat.php", true);

            xhr.onload = () => {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        let data = xhr.response;
                        inutFeild.value = "";
                    }
                }
            };
            let formData = new FormData(form);
            xhr.send(formData);
        }

        setInterval(() => {
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "php/get-chat.php", true);

            xhr.onload = () => {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        let data = xhr.response;
                        chatBox.innerHTML = data;
                    }
                }
            };
            let formData = new FormData(form);
            xhr.send(formData);
        }, 1000);
    </script>
</body>

</html>