$(document).ready(function () {
    $('body').addClass('inner-page about-us');     
    $(window).load(function () {
        var order_id = $("#order_id").val();
        var data = { id: order_id };
        $.ajax({
            url: "/client/page/confirm-email",
            method: "GET",
            data: data,
            success: function (responseSendMail) {
                if (responseSendMail.status == 200) {
                    
                }
                if (responseSendMail.status == 404) {
                    
                }
            },
        });
    });
});
