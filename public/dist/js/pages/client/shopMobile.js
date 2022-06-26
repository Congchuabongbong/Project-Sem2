$(document).ready(function () {
    equalElement();
    //start add to cart here!
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
                    position: "bottom-start",
                    icon: "error",
                    title: `${response.message}`,
                    showConfirmButton: false,
                    timer: 1000,
                });
            },
        });
    });
    //------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    //Start filter here!
    // array filter
    var arrayBrand = new Set();
    //filter brand
    $(document).on("click", ".filter-brand", function (e) {
        e.preventDefault();
        if (!$(this).hasClass("active") && $(this).attr("value") != -1) {
            $(this).addClass("active");
            $(".filter-brand").each(function () {
                if ($(this).attr("value") == -1) {
                    $(this).removeClass("active");
                }
            });
        } else {
            $(this).removeClass("active");
        }
        if (!$(this).hasClass("active") && $(this).attr("value") == -1) {
            $(".filter-brand").each(function () {
                $(this).removeClass("active");
            });
            $(this).addClass("active");
        }
        $(this).each(function () {
            if ($(this).hasClass("active")) {
                if ($(this).attr("value") == "-1" || arrayBrand.has("-1")) {
                    arrayBrand.clear();
                    arrayBrand.add($(this).attr("value"));
                }
                arrayBrand.add($(this).attr("value"));
            } else if (!$(this).hasClass("active")) {
                if (arrayBrand.has($(this).attr("value"))) {
                    arrayBrand.delete($(this).attr("value"));
                }
            }
        });
        fetch_data_filter();
        setTimeout(function () {
            equalElement();
        }, 100);
    });
    //filter price
    $(document).on("click", ".filter-price", function (e) {
        e.preventDefault();
        $(".filter-price").each(function () {
            if ($(this).hasClass("active")) {
                $(this).removeClass("active");
            }
        });
        $(this).addClass("active");
        fetch_data_filter();
        setTimeout(function () {
            equalElement();
        }, 100);
    });
    //filter battery
    $(".filter-battery").click(function (e) {
        e.preventDefault();
        $(".filter-battery").each(function () {
            if ($(this).hasClass("active")) {
                $(this).removeClass("active");
            }
        });
        $(this).addClass("active");
        fetch_data_filter();
        setTimeout(function () {
            equalElement();
        }, 100);
    });
    //filter screen
    $(".filter-screen").click(function (e) {
        e.preventDefault();
        $(".filter-screen").each(function () {
            if ($(this).hasClass("active")) {
                $(this).removeClass("active");
            }
        });
        $(this).addClass("active");
        fetch_data_filter();
        setTimeout(function () {
            equalElement();
        }, 100);
    });
    //filter ram
    $(".filter-ram").click(function (e) {
        e.preventDefault();
        $(".filter-ram").each(function () {
            if ($(this).hasClass("active")) {
                $(this).removeClass("active");
            }
        });
        $(this).addClass("active");
        fetch_data_filter();
        setTimeout(function () {
            equalElement();
        }, 100);
    });
    //paginate limit
    $("#pagination_limit").change(function (e) {
        fetch_data_filter();
        setTimeout(function () {
            equalElement();
        }, 100);
    });
    //sort by
    $("#sortBy").change(function (e) {
        fetch_data_filter();
        setTimeout(function () {
            equalElement();
        }, 100);
        $content[0].scrollTop = $content[0].scrollHeight;
    });
    $('input[name="search"]').keyup(function (e) {
        e.preventDefault();
        var pagination_limit = $("#pagination_limit").val();
        var sortBy = $("#sortBy").val();
        var nameMobile = $('input[name="search"]').val();
        var data = {
            pagination_limit: pagination_limit,
            sortBy: sortBy,
            name: nameMobile,
        };
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        $.ajax({
            url: "/client/page/shop/mobile/fetch_data?page=",
            method: "POST",
            beforeSend: function () {
                $("#listSearch").html("");
                equalElement();
            },
            data: data,
            success: function (response) {
                $("#fetchData").html(response.view);
                for (var i = 0; i < response.mobiles_suggest.length; i++) {
                    $("#listSearch").append(
                        `<option data-value="/client/page/shop/mobile/${response.mobiles_suggest[i].id}" value = "${response.mobiles_suggest[i].name}"></option>`
                    );
                }
                setTimeout(function () {
                    equalElement();
                }, 100);
                $content[0].scrollTop = $content[0].scrollHeight;
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
    //paginate
    $(document).on("click", "#pagination a", function (e) {
        e.preventDefault();
        var page = $(this).attr("href").split("page=")[1];
        fetch_data_pagination(page);
        setTimeout(function () {
            equalElement();
        }, 100);
    });
    //paginate fetch data
    function fetch_data_pagination(page) {
        var data = getData();
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        $.ajax({
            url: "/client/page/shop/mobile/fetch_data?page=" + page,
            method: "POST",
            beforeSend: function () {
                equalElement();
            },
            data: data,
            success: function (response) {
                equalElement();
                $("#fetchData").html(response.view);
                setTimeout(function () {
                    equalElement();
                }, 100);
                $content[0].scrollTop = $content[0].scrollHeight;
            },
        });
    }

    //get data filter
    function getData() {
        var pagination_limit = $("#pagination_limit").val();
        var sortBy = $("#sortBy").val();
        var priceFilter;
        var batteryFilter;
        var screenFilter;
        var ramFilter;
        $(".filter-price").each(function () {
            if ($(this).hasClass("active")) {
                priceFilter = $(this).attr("value");
            }
        });
        $(".filter-battery").each(function () {
            if ($(this).hasClass("active")) {
                batteryFilter = $(this).attr("value");
            }
        });
        $(".filter-screen").each(function () {
            if ($(this).hasClass("active")) {
                screenFilter = $(this).attr("value");
            }
        });
        $(".filter-ram").each(function () {
            if ($(this).hasClass("active")) {
                ramFilter = $(this).attr("value");
            }
        });
        var data = {
            brandArrID: Array.from(arrayBrand),
            pagination_limit: pagination_limit,
            price_filter: priceFilter,
            battery_filter: batteryFilter,
            screen_filter: screenFilter,
            ram: ramFilter,
            sortBy: sortBy,
        };
        return data;
    }
    //fetch data filter
    function fetch_data_filter() {
        equalElement();
        var data = getData();
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        $.ajax({
            url: "/client/page/shop/mobile/fetch_data?nocache=" + Math.random(),
            method: "POST",
            beforeSend: function () {
                equalElement();
            },
            data: data,
            success: function (response) {
                equalElement();
                $("#fetchData").html(response.view);
                setTimeout(function () {
                    equalElement();
                }, 100);
                $content[0].scrollTop = $content[0].scrollHeight;
            },
        });
    }
    //equal element
    function equalElement() {
        $(".equal-container").each(function () {
            var _this = $(this),
                _children = _this.find(".equal-elem");
            if (_children.length) {
                _children.css("height", "auto");
                var max_height = 0;
                _children.each(function () {
                    var el_height = $(this).height();
                    if (max_height < parseFloat(el_height)) {
                        max_height = parseFloat(el_height);
                    }
                });
                _children.height(parseInt(max_height, 10));
            }
        });
    }
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
