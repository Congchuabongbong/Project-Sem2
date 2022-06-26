$(document).ready(function (e) {    
    $('body').addClass('checkout page');    
    var total;
    var total_vnd;
    $(window).load(function () {
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        $.ajax({
            url: "/client/page/checkout-total",
            method: "GET",
            success: function (response) {
                total = response.paypal_format;
                total_vnd = response.total.toLocaleString("it-IT", {
                    style: "currency",
                    currency: "VND",
                });
                $("#grand-total-price").html(total_vnd);
            },
        });
    });
    $('input:radio[name="payment-method"]').change(function () {
        if ($(this).is(":checked") && $(this).val() == "paypal") {
            $("#btnPlaceOrder").show();
            $("#btnCod").hide();
        }
        if ($(this).is(":checked") && $(this).val() == "cod") {
            $("#btnPlaceOrder").hide();
            $("#btnCod").show();
        }
    });
    function getValueForm() {
        var name = $("input[name='name']").val();
        var email = $('input[name="email"]').val();
        var phone = $('input[name="phone"]').val();
        var province = $('input[name="province"]').val();
        var district = $('input[name="district"]').val();
        var ward = $('input[name="ward"]').val();
        var address_detail = $('input[name="address_detail"]').val();
        var comment = $('input[name="comment"]').val();
        var data = {
            name: name,
            email: email,
            phone: phone,
            province: province,
            district: district,
            ward: ward,
            address_detail: address_detail,
            comment: comment,
        };
        return data;
    }    
    paypal.Button.render(
        {
            // Configure environment
            env: "sandbox",
            commit: true, // Show Pay Now button
            client: {
                sandbox:
                    "AbxeXUFr0NtwiRVfz5y8H4gfmSs3WeyCWVOLejqrmegNrR5ySQ-P_KS7l_aEJA2n86onnbMK1ZW3E6f2",
                production: "demo_production_client_id",
            },
            // Customize button (optional)
            locale: "en_US",
            style: {
                size: "medium",
                color: "gold",
                shape: "pill",
            },
            // Called when page displays
            validate: function (actions) {
                actions.disable(); // Allow for validation in onClick()
                paypalActions = actions; // Save for later enable()/disable() calls
            },

            // Called for every click on the PayPal button even if actions.disabled
            onClick: function (e) {
                paypalActions.disable();
                var formOrder = getValueForm();
                formOrder.paymentMethod = 1;
                console.log(formOrder);
                $.ajaxSetup({
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                            "content"
                        ),
                    },
                });
                $.ajax({
                    url: "/client/page/validate",
                    method: "post",
                    data: formOrder,
                    beforeSend: function () {
                        $(document).find("span.error").text(" ");
                    },
                    success: function (resp) {
                        if (resp.status == 202) {
                            paypalActions.enable();
                        }
                        if (resp.status == 400) {
                            paypalActions.disable();
                            var status = "warning";
                            alertAction(resp.message, status);
                            $.each(resp.errors, function (prefix, val) {
                                $("span." + prefix + "_error").text(val[0]);
                            });
                        }
                    },
                });
            },
            // Buyer clicked the PayPal button.
            payment: function (data, actions) {
                return actions.payment.create({
                    payment: {
                        transactions: [
                            {
                                amount: {
                                    total: `${total}`,
                                    currency: "USD",
                                },
                            },
                        ],
                    },
                });
            },
            // Buyer logged in and authorized the payment
            onAuthorize: function (data, actions) {
                return actions.payment.execute().then(function () {
                    var formOrder = getValueForm();
                    formOrder.paymentMethod = 1;
                    $.ajaxSetup({
                        headers: {
                            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                                "content"
                            ),
                        },
                    });
                    $.ajax({
                        url: "/client/page/order",
                        method: "post",
                        data: formOrder,
                        success: function (resp) {                          
                            if (resp.status == 200) {
                                window.location.href = `/client/page/thankyou/${resp.orderID}`;                               
                            }
                            if (resp.status == 500) {
                                paypalActions.disable();
                                var status = "error";
                                alertAction(resp.message, status);
                            }
                            if (resp.status == 404) {                                
                                var status = "error";
                                alertAction(resp.message, status);
                            }
                        },
                    });
                });
            },
        },
        "#btnPlaceOrder"
    );

    $("#btnCod").click(function (e) {
        e.preventDefault();
        var formOrder = getValueForm();
        formOrder.paymentMethod = 0;
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        $.ajax({
            url: "/client/page/validate",
            method: "post",
            data: formOrder,
            beforeSend: function () {
                $(document).find("span.error").text(" ");
            },
            success: function (resp) {
                if (resp.status == 202) {
                    $.ajaxSetup({
                        headers: {
                            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                                "content"
                            ),
                        },
                    });
                    $.ajax({
                        url: "/client/page/order",
                        method: "post",
                        data: formOrder,
                        success: function (resp) {
                            if (resp.status == 200) {
                                window.location.href = `/client/page/thankyou/${resp.orderID}`;                                
                            }
                            if (resp.status == 500) {                               
                                var status = "error";
                                alertAction(resp.message, status);
                            }
                            if (resp.status == 404) {                                
                                var status = "error";
                                alertAction(resp.message, status);
                            }
                        },
                    });
                }
                if (resp.status == 400) {                   
                    var status = "warning";
                    alertAction(resp.message, status);
                    $.each(resp.errors, function (prefix, val) {
                        $("span." + prefix + "_error").text(val[0]);
                    });
                }
            },
        });
    });
    //alert
    function alertAction(message, status) {
        Swal.fire({
            position: "top-end",
            icon: `${status}`,
            title: `${message}`,
            showConfirmButton: false,
            timer: 1000,
        });
    }
   
});
