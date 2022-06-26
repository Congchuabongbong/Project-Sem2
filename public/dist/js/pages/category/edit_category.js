$(document).ready(function () {
    $("#btn-submit").click(function (e) {
        e.preventDefault();
        var id = $('input[name="id"]').val()
        var name = $('input[name="name"]').val();
        var description = $('textarea[name="description"]').val();
        var data = { name: name, description: description };
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        $.ajax({
            url: "/admin/category/" + id,
            method: "PUT",
            data: data,
            beforeSend: function () {
                $(document).find("span.error").text("");
            },
            success: function (response) {
                if (response.status == 400) {
                    $.each(response.errors, function (prefix, val) {
                        $("span." + prefix + "_error").text(val[0]);
                    });
                } else {
                    if (response.status == 200) {
                        setTimeout(function () {
                            alertAction(response.message);
                        }, 1500);
                        alertProcessData();
                        return;
                    }
                    if (response.status == 500) {
                        setTimeout(function () {
                            alertActionFailed(response.message);
                        }, 1500);
                        alertProcessData();

                        return;
                    }
                }
            },
            error: function (response) {},
        });
    });

    //alert
    function alertAction(message) {
        Swal.fire({
            position: "top-end",
            icon: "success",
            title: `${message}`,
            showConfirmButton: false,
            timer: 1500,
        });
    }

    function alertActionFailed(message) {
        Swal.fire({
            position: "top-end",
            icon: "warning",
            title: `${message}`,
            showConfirmButton: false,
            timer: 1500,
        });
    }

    function alertProcessData() {
        let timerInterval;
        Swal.fire({
            title: "Update in progress!",
            html: "Progress will be completed in about in <b></b> milliseconds.",
            timer: 1500,
            timerProgressBar: true,
            didOpen: () => {
                Swal.showLoading();
                const b = Swal.getHtmlContainer().querySelector("b");
                timerInterval = setInterval(() => {
                    b.textContent = Swal.getTimerLeft();
                }, 100);
            },
            willClose: () => {
                clearInterval(timerInterval);
            },
        }).then((result) => {
            /* Read more about handling dismissals below */
            if (result.dismiss === Swal.DismissReason.timer) {
                console.log("I was closed by the timer");
            }
        });
    }
});
