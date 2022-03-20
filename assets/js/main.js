"user strict";

$(".search-wrapper button").on("click", function () {
    if (!$(".search-wrapper input").val()) {
        $(".search-wrapper input, .search-wrapper button").toggleClass(
            "active"
        );
        $(".search-wrapper input").focus();
    }
});
