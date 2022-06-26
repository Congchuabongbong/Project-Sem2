window.addEventListener("DOMContentLoaded", function () {
    //filter
    $("#filterSubmit").click(function (e) {
        e.preventDefault();
        var pagination_limit = $('select[name=pagination_limit]').val();
        var name = $('input[name=name]').val();
        var sortBy = $('select[name=sortBy]').val();
        let data = {
            'pagination_limit':pagination_limit,
            'name':name,
            'sortBy':sortBy
        }
        console.log(data);
        $.ajax({
            url: "/admin/feedback/fetch_data",
            method: "GET",
            data: data,
            success: function (response) {
                $("#data_table").html(response);
            },
        });
    });
    //refresh
    $("#resetFilter").click(function (e) {
        $.ajax({
            url: "/admin/feedback",
            method: "GET",
            success: function (response) {
                $("#data_table").html(response);
            },
        });
    });
    //paginate
    $(document).on("click", ".pagination a", function (e) {
        e.preventDefault();
        var page = $(this).attr("href").split("page=")[1];
        fetch_data(page);
    });
    //paginate fetch data
    function fetch_data(page) {
        var data = $("#formFilter").serialize();
        $.ajax({
            url: "/admin/feedback/fetch_data?page=" + page,
            data: data,
            success: function (response) {
                $("#data_table").html(response);
            },
        });
    }

    //delete
    $(document).on("click", ".delete", function (e) {
        e.preventDefault();
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!",
        }).then((result) => {
            if (result.isConfirmed) {
                //FIXME:
                var data = $("#formFilter").serialize();
                $.ajaxSetup({
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                            "content"
                        ),
                    },
                });
                $.ajax({
                    url: "/admin/feedback/" + $(this).attr("feedbackID"),
                    method: "DELETE",
                    success: function (response) {
                        if (response.status == 200) {
                            alertProcess();
                            setTimeout(function () {
                                Swal.fire(
                                    "Deleted!",
                                    `${response.message}`,
                                    "success"
                                );
                                $("#data_table").load(
                                    "/admin/feedback/fetch_data",
                                    data
                                );
                            }, 500);
                        }
                        if (response.status == 404) {
                            alertProcess();
                            setTimeout(function () {
                                Swal.fire(
                                    "Delete not success!",
                                    `${response.message}`,
                                    "error"
                                );
                                $("#data_table").load(
                                    "/admin/feedback/fetch_data",
                                    data
                                );
                            }, 500);
                        }
                    },
                });
            }
        });
    });

    //alert alert process
    function alertProcess() {
        let timerInterval;
        Swal.fire({
            title: "Deletion in progress",
            html: "Progress will be completed in about in <b></b> milliseconds.",
            timer: 500,
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
