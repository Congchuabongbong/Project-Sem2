$(document).ready(function () {
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
                document.getElementById(
                    "valueUpLoad"
                ).value += (`${result.info.secure_url}` + ",");
                // alert(document.getElementById("valueUpLoad").value);
                document.getElementById("list-preview-image").innerHTML += `
               <span class="m-2" id="preview-image" style="position: relative; with:220px; display:inline-block;">
                   <img src="${result.info.secure_url}" class="img-thumbnail img-bordered" style="width: 220px; ml-2" delete="${result.info.delete_token}">
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
                    data: { token: delete_token },
                    success: function (result) {
                        if (result.result == "ok") {
                            btnDeleteImg.parent().remove();
                            var urlDelete = btnDeleteImg.siblings().attr("src");
                            var arrCurrentValueUpLoad = $("#valueUpLoad")
                                .val()
                                .split(",");
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
                        Swal.fire("Deleted!", "Something went wrong!", "error");
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
    //submit form ajax
    $("#btn-submit").click(function (e) {
        e.preventDefault();
        const editorData = editor.getData();
        var name = $('input[name="name"]').val();
        var categoryID = $('select[name="categoryID"]').val();
        var brandID = $('select[name="brandID"]').val();
        var name = $('input[name="name"]').val();
        var price = $('input[name="price"]').val();
        var color = $('input[name="color"]').val();
        var quantity = $('input[name="quantity"]').val();
        var ram = $('input[name="ram"]').val();
        var memory = $('input[name="memory"]').val();
        var pin = $('input[name="pin"]').val();
        var camera = $('input[name="camera"]').val();
        var screenSize = $('input[name="screenSize"]').val();
        var thumbnail = $('input[name="thumbnail"]').val();
        var status = $('select[name="status"]').val();
        var saleOff = $('input[name="saleOff"]').val();
        var description = $('textarea[name="description"]').val();
        var detail = editorData;
        var data = {
            name: name,
            brandID: brandID,
            categoryID: categoryID,
            price: price,
            color: color,
            quantity: quantity,
            ram: ram,
            memory: memory,
            pin: pin,
            camera: camera,
            screenSize: screenSize,
            thumbnail: thumbnail,
            status: status,
            saleOff: saleOff,
            description: description,
            detail: detail,
        };
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        $.ajax({
            url: "/admin/mobile",
            method: "POST",
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
                        setTimeout(function () {
                            window.location.href = "/admin/mobile";
                        }, 3000);
                    }
                    if (response.status == 500) {
                        setTimeout(function () {
                            alertAction(response.message);
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
    //alert process
    function alertProcessData() {
        let timerInterval;
        Swal.fire({
            title: "Insert in progress!",
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
    //reset
    $("#btn-reset").click(function () {
        $(":input", ".row")
            .not(":button, :submit, :reset, :hidden")
            .val(" ")
            .removeAttr("checked")
            .removeAttr("selected");
        const editorData = editor.setData(' ');
    });
});
