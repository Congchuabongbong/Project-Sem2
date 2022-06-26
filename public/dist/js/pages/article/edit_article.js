window.addEventListener('DOMContentLoaded', function () {

    //CK editor
    let editor;
    ClassicEditor.create(document.querySelector("#editor"))
        .then((newEditor) => {
            editor = newEditor;
        })
        .catch((error) => {
            console.error(error);
        });
    // upload file Thumbnail

    var btnThumbnailLink = document.getElementById("btnThumbnailLink");
    var myWidget_thumbnail = cloudinary.createUploadWidget(
        {
            cloudName: "binht2012e",
            uploadPreset: "cndcrp9y",
        },
        (error, result) => {
            if (!error && result && result.event === "success") {
                console.log(result.info);
                document.getElementById("thumbnail").value = `${result.info.secure_url}`;
                // alert(document.getElementById("valueUpLoad").value);
                document.getElementById("list-preview-image").innerHTML = `
               <span class="m-2" id="preview-image" style="position: relative; width:200px; display:inline-block;">
                   <img src="${result.info.secure_url}" class="img-thumbnail img-bordered" style="width:200px; ml-2" delete="${result.info.delete_token}">
                   <i class="fas fa-times btnDeleteImg" style="position: absolute;right: 0;top: 0; cursor: pointer;"></i>
               </span>
               `;
            }
        }
    );
    //btn-thumbnail
    btnThumbnailLink.addEventListener(
        "click",
        function () {
            document.getElementById("list-preview-image").innerHTML = '';
            document.getElementById("thumbnail").value = '';
            myWidget_thumbnail.open();
        },
        false
    );
    // handle delete thumbnail cloudinary
    $(document).on("click", ".btnDeleteImg", function (e) {
        e.preventDefault();
        var btnDeleteImg = $(this);
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
                var delete_token = btnDeleteImg.siblings().attr("delete");
                $.ajax({
                    url: "https://api.cloudinary.com/v1_1/binht2012e/delete_by_token",
                    cache: false,
                    method: "POST",
                    data: {token: delete_token},
                    success: function (result) {
                        if (result.result == "ok") {
                            btnDeleteImg.parent().remove();
                            var urlDelete = btnDeleteImg.siblings().attr("src");
                            var arrCurrentValueUpLoad = $("#valueUpLoad").val().split(",");
                            arrCurrentValueUpLoad.pop();
                            removeElement(arrCurrentValueUpLoad, urlDelete);
                            $("#valueUpLoad").val("");
                            if (arrCurrentValueUpLoad.length > 0) {
                                var url = "";
                                for (
                                    let i = 0;
                                    i < arrCurrentValueUpLoad.length;
                                    i++
                                ) {
                                    url += `${arrCurrentValueUpLoad[i]},`;
                                }
                                $("#valueUpLoad").val(url);
                            }
                            Swal.fire(
                                "Deleted!",
                                "Data have been successfully deleted!",
                                "success"
                            );
                        } else {
                            Swal.fire(
                                "Deleted!",
                                "Something went wrong!",
                                "error"
                            );
                        }
                    },
                    error: function () {
                        Swal.fire(
                            "Deleted!",
                            "Something went wrong!",
                            "error"
                        );
                    },
                });
            }
        });
    });

    //remove array
    function removeElement(array, elem) {
        var index = array.indexOf(elem);
        if (index > -1) {
            array.splice(index, 1);
        }
    }

    //jquery validation
    // $("#mainForm").validate({
    //     onfocusout: false,
    //     onkeyup: false,
    //     onclick: false,
    //     rules: {
    //         "title": {
    //             required: true
    //         },
    //         "brand": {
    //             required: true
    //         },
    //         "author": {
    //             required: true
    //         },
    //         "thumbnail": {
    //             required: true
    //         },
    //         "description": {
    //             required: true
    //         },
    //         "detail": {
    //             required: true
    //         }
    //     }
    // });

    //process submit button
    $('#mainForm').submit(function (e) {
        e.preventDefault();
        const editorData = editor.getData();
        var id = $('input[name="id"]').val();
        var brandID = $('select[name="brandID"]').val();
        var title = $('input[name="title"]').val();
        var author = $('input[name="author"]').val();
        var thumbnail = $('input[name="thumbnail"]').val();
        var description = $('textarea[name="description"]').val();
        var detail = editorData;
        // console.log(detail);
        // alert(thumbnail);
        let data = {
            title: title,
            brandID: brandID,
            author: author,
            thumbnail: thumbnail,
            description: description,
            detail: detail
        };
        console.log(data)
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "/admin/article/" + id,
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
    })
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
})
