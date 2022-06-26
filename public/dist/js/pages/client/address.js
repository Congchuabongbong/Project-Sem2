$(document).ready(function (e) {
    $.ajax({
        url: "/client/page/province",
        method: "GET",
        success: function (response) {
            for (var i = 0; i < response.provinces.length; i++) {
                $("#listProvinces").append(
                    `<option>${response.provinces[i].name}</option>`
                );
            }
            $("#province").change(function () {
                var province = $(this).val();
                var data = { province: province };
                $.ajax({
                    url: "/client/page/district",
                    method: "GET",
                    data: data,
                    beforeSend: function () {
                        $("#districts").html(" ");
                    },
                    success: function (response) {
                        for (var i = 0; i < response.districts.length; i++) {
                            $("#districts").append(
                                `<option>${response.districts[i].name}</option>`
                            );
                        }
                        $("#district").change(function () {
                            var district = $(this).val();
                            var data = { district: district };
                            $.ajax({
                                url: "/client/page/ward",
                                method: "GET",
                                data: data,
                                beforeSend: function () {
                                    $("#wards").html(" ");
                                },
                                success: function (response) {
                                    for (
                                        var i = 0;
                                        i < response.wards.length;
                                        i++
                                    ) {
                                        $("#wards").append(
                                            `<option>${response.wards[i].name}</option>`
                                        );
                                    }
                                },
                            });
                        });
                    },
                });
            });
        },
    });

    




});
