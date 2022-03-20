<!-- meta tags and other links -->
<!DOCTYPE html>
<html lang="en">

<?php include_once "header.php" ?>

<body>
    <!-- Overlay -->
    <div class="overlay"></div>

    <!-- Sign Up form -->
    <div class="container">
        <div class="card custom--card wrapper">
            <div class="card-header">
                <h4 class="title m-0">Why waiting? Chat fast. Goo...</h4>
            </div>
            <div class="card-body">
                <p class="errorTxt">This is Error !</p>
                <form action="#" class="account-form row gy-3">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="email" class="form-label">Email</label>
                            <input name="email" type="email" class="form-control form--control" id="email">
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
                        <button type="submit" class="cmn--btn btn--base w-100 submitBtn">Login Account</button>
                    </div>
                </form>
                <p class="text-center mt-4">Don't Have any Account? <a class="text--base fw-bold ms-2" href="register.php">Register
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
                passFld.focus();
            } else {
                passFld.type = "password";
                passFld.focus();
            }
        };



        // Form Submission
        const form = document.querySelector(".account-form");
        const submitBtn = document.querySelector(".submitBtn");
        const errorTxt = document.querySelector(".errorTxt");

        form.onsubmit = (e) => {
            e.preventDefault();
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "php/signin.php", true);

            xhr.onload = () => {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        let data = xhr.response;
                        if (data == "Success") {
                            location.href = "profile.php";
                        } else {
                            errorTxt.textContent = data;
                            errorTxt.style.display = "block";
                        }
                    }
                }
            };
            let formData = new FormData(form);
            xhr.send(formData);
        };
    </script>
</body>

</html>