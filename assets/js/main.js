"user strict";

$(".search-wrapper button").on("click", function () {
    if (!$(".search-wrapper input").val()) {
        $(".search-wrapper input, .search-wrapper button").toggleClass(
            "active"
        );
        $(".search-wrapper input").focus();
    }
});

// Form Submission
const form = document.querySelector(".account-form");
const submitBtn = document.querySelector(".submitBtn");
const errorTxt = document.querySelector(".submitBtn");

form.onsubmit = (e) => {
    e.preventDefault();
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/signup.php", true);

    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
                if (data == "success") {
                } else {
                    errorTxt.style.display = "block";
                    errorTxt.textContent = data;
                }
            }
        }
    };
    let formData = new FormData(form);
    xhr.send(formData);
};
