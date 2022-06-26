$(document).ready(function () {    
    $('body').addClass('shopping-cart page');    
    $(document).on("click", ".btn-quantity", function (e) {
        e.preventDefault();
        var quantity = $(this).siblings(".quantity_item").val();
        var price = $(this).siblings(".price_item").val();
        var total = quantity * price;
        var parentOfThis = $(this).parent();
        var siblingParentOfThis = parentOfThis.parent().siblings(".sub-total");
        siblingParentOfThis.children(".totalPrice").text(
            total.toLocaleString("it-IT", {
                style: "currency",
                currency: "VND",
            })
        );
        var data = { quantity: quantity };
        var id = $(this).siblings("input[name=id]").val();
        var data = { id: id, quantity: quantity };
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        $.ajax({
            url: "/client/page/shopping/update-cart",
            method: "POST",
            data: data,
            success: function (response) {
                if (response.status === 200) {
                    $("#total_cart").text(response.quantity + " items");
                    $("#total_bill").text(
                        response.total.toLocaleString("it-IT", {
                            style: "currency",
                            currency: "VND",
                        })
                    );
                    $("#total-info").text(
                        response.total.toLocaleString("it-IT", {
                            style: "currency",
                            currency: "VND",
                        })
                    );
                }
            },
        });
    });
    $(document).on("click", ".btn-delete", function (e) {
        let id = $(this)
            .parent()
            .siblings(".quantity")
            .children(".quantity-input")
            .children(".id")
            .val();
        var data = { id: id };
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        $.ajax({
            url: "/client/page/shopping/remove",
            method: "POST",
            data: data,
            success: function (response) {
                if (response.status === 200) {
                    $("#total_cart").text(response.quantity + " items");
                    $("#total_bill").text(
                        response.total.toLocaleString("it-IT", {
                            style: "currency",
                            currency: "VND",
                        })
                    );
                    $("#total-info").text(
                        response.total.toLocaleString("it-IT", {
                            style: "currency",
                            currency: "VND",
                        })
                    );
                    $("#listCart").html(response.list_cart);
                }
            },
        });
    });
    $(document).on("click", ".btn-clear", function (e) {
        e.preventDefault();
        Swal.fire({
            title: "Bạn Chắc Chứ?",
            text: "Tất cả sản phẩm sẽ bị xóa khỏi giỏ hàng!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Xoá giỏ hàng",
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajaxSetup({
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                            "content"
                        ),
                    },
                });

                $.ajax({
                    url: "/client/page/shopping/clear",
                    method: "POST",
                    success: function (response) {
                        if (response.status === 200) {
                            $("#total_cart").text(response.quantity + " items");
                            $("#total_bill").text(
                                response.total.toLocaleString("it-IT", {
                                    style: "currency",
                                    currency: "VND",
                                })
                            );
                            $("#total-info").text(
                                response.total.toLocaleString("it-IT", {
                                    style: "currency",
                                    currency: "VND",
                                })
                            );
                            $("#listCart").html(response.list_cart);
                            Swal.fire(
                                "Deleted!",
                                `${response.message}`,
                                "success"
                            );
                        }
                    },
                });
            }
        });
    });
});
