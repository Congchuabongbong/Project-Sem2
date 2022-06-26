$(document).ready(function () {
    $(document).on("click", ".image-preview", function (e) {
        var url = $(this).attr("src");
        $("#currentImage").attr("src", url);
        $(this).addClass("active");
    });
    var arrThumbnail = $("#arr_thumbnail").val().split(",");    
    arrThumbnail.pop();  
    var listThumbnail;    
    for (let i = 0; i < arrThumbnail.length; i++) {
        document.getElementById('product-image-thumbs').innerHTML += `
        <div class="product-image-thumb" style="cursor: pointer;">
        <img class="image-preview" src='${arrThumbnail[i]}'>
        </div>        
        `;                  
    }        
    //delete
    $(document).on("click", "#btn-delete", function (e) {
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
                $.ajaxSetup({
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                            "content"
                        ),
                    },
                });
                $.ajax({
                    url: "/admin/mobile/" + $(this).attr("mobile_id"),
                    method: "DELETE",
                    success: function (response) {
                        if (response.status == 200) {
                            alertProcess();
                            setTimeout(function () {
                                window.location.replace("/admin/mobile");
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
                                window.location.href = "/client/page/404";
                            }, 500);
                        }
                        if (response.status == 500) {
                            alertProcess();
                            setTimeout(function () {
                                Swal.fire(
                                    "Delete not success!",
                                    `${response.message}`,
                                    "error"
                                );
                            }, 500);
                        }
                    },
                    error: function (response) {
                        if (response.status == 500) {
                            alertProcess();
                            setTimeout(function () {
                                Swal.fire(
                                    "Delete not success!",
                                    `Something went wrong!!`,
                                    "error"
                                );
                            }, 1500);
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
