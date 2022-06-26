$(document).ready(function () {    
    $('input[name="search"]').keyup(function (e) {        
        e.preventDefault();       
        var nameMobile = $('input[name="search"]').val();
        var data = {          
            name: nameMobile,
        };
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        $.ajax({
            url: "/client/page/mobile/search",
            method: "POST",
            beforeSend: function () {
                $("#listSearch").html("");               
            },
            data: data,
            success: function (response) {               
                for (var i = 0; i < response.mobiles_suggest.length; i++) {
                    $("#listSearch").append(
                        `<option data-value="/client/page/shop/mobile/${response.mobiles_suggest[i].id}" value = "${response.mobiles_suggest[i].name}"></option>`
                    );
                }                         
            },
        });
    });    
    $("#btn-search").click(function (e) {
        e.preventDefault();
        var value = $("#search").val();
        if (
            $('#listSearch [value="' + value + '"]').data("value") != undefined
        ) {
            location.href = $('#listSearch [value="' + value + '"]').data(
                "value"
            );
        }else {
            Swal.fire({
                icon: "warning",
                title: "Xin Lỗi",
                text: "Không có kết quả nào tìm kiếm nào!",                
            });
        }
      
    });
});
