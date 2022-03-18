<!-- meta tags and other links -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat with your friends</title>
    <link rel="icon" type="image/png" href="assets/images/favicon.png" sizes="16x16">
    <!-- bootstrap 5  -->
    <link rel="stylesheet" href="assets/css/lib/bootstrap.min.css">
    <!-- Icon Link  -->
    <link rel="stylesheet" href="assets/css/all.min.css">
    <link rel="stylesheet" href="assets/css/line-awesome.min.css">
    <link rel="stylesheet" href="assets/css/lib/animate.css">

    <!-- Plugin Link -->
    <link rel="stylesheet" href="assets/css/lib/slick.css">

    <!-- Main css -->
    <link rel="stylesheet" href="assets/css/main.css">
</head>

<body>
    <!-- Overlay -->
    <div class="overlay"></div>

    <!-- Sign Up form -->
    <div class="container">
        <div class="card custom--card wrapper">
            <div class="card-header">
                <h4 class="title m-0">Sign up for Chatting</h4>
            </div>
            <div class="card-body">
                <p class="errorTxt">This is Error !</p>
                <form method="POST" action="#" class="account-form row gy-3" enctype="multipart/form-data">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="fname" class="form-label">First Name</label>
                            <input name="fname" type="text" class="form-control form--control" id="fname">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="lname" class="form-label">Last Name</label>
                            <input name="lname" type="text" class="form-control form--control" id="lname">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email" class="form-label">Email</label>
                            <input name="email" type="email" class="form-control form--control" id="email">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="profile-pic" class="form-label">Profile Picture</label>
                            <input name="profile-pic" type="file" class="form-control " id="profile-pic">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="password" class="form-label">Password</label>
                            <div class="input-group">
                                <input name="password" type="password" class="form-control form--control" id="password">
                                <span class="input-group-text border-left-none pass-toggler"><i class="las la-eye"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="cmn--btn btn--base w-100 submitBtn">Create Account</button>
                    </div>
                </form>
                <p class="text-center mt-4">Already Have Account? <a class="text--base fw-bold ms-2" href="login.php">Login
                        Here</a></p>
            </div>
        </div>
    </div>
    <!-- Sign Up form -->

    <!-- jQuery library -->
    <script src="assets/js/lib/jquery-3.6.0.min.js"></script>

    <!-- Bootstrap 5 js -->
    <script src="assets/js/lib/bootstrap.min.js"></script>

    <!-- Pluglin Link -->
    <script src="assets/js/lib/slick.min.js"></script>

    <!-- Main js -->
    <script src="assets/js/main.js"></script>

    <script>
        const passFld = document.querySelector(".account-form input[type='password']");
        const passToggler = document.querySelector(".pass-toggler");

        passToggler.onclick = () => {
            if (passFld.type == "password") {
                passFld.type = "text";
            } else {
                passFld.type = "password";
            }
        };
    </script>
</body>

</html>