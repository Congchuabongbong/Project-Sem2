$(document).ready(function () {
    $("body").addClass("detail page");   
    // add to cart
    $(document).on("click", "#btnAddToCart", function (e) {
        e.preventDefault();
        var data = $(this).parents("#formCart").serialize();
        $.ajax({
            url: "/client/page/shopping/cart ",
            method: "POST",
            data: data,
            success: function (response) {
                if (response.status == 200) {
                    var action = "success";
                    $("#total_cart").text(response.total_quantity + " items");
                    alertCheckCart(action, response.message);
                }
                if (response.status == 400) {
                    var action = "warning";
                    $("#total_cart").text(response.total_quantity + " items");
                    alertCheckCart(action, response.message);
                }
            },
            error: function (response) {
                Swal.fire({
                    position: "top-end",
                    icon: "error",
                    title: `${response.message}`,
                    showConfirmButton: false,
                    timer: 1000,
                });
            },
        });
    });
    function alertCheckCart(action, message) {
        Swal.fire({
            position: "bottom-start",
            icon: `${action}`,
            title: `${message}`,
            showConfirmButton: false,
            timer: 1000,
        });
    }
});
