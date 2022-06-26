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
                console.log(result.info);
                document.getElementById(
                    "valueUpLoad"
                ).value += (`${result.info.secure_url}` + ",");
                document.getElementById("list-preview-image").innerHTML += `
                <span class="m-2" id="preview-image" style="position: relative; with:220px; display:inline-block;">
                    <img src="${result.info.secure_url}" alt="" class="img-thumbnail img-bordered" style="width: 220px; ml-2" delete="${result.info.delete_token}">                    
                    <i class="fas fa-times btnDeleteImg" style=" position: absolute;right: 0;top: 0; cursor: pointer;" ></i>  
                </span>                                                   
                `;
            }
        }
    );
    btnThumbnailLink.addEventListener(
        "click",
        function () {
            myWidget_thumbnail.open();
        },
        false
    );
    //get value current brand
    $("#brand option").each(function () {
        if ($(this).val() == $("#current_brand").val()) {
            $(this).attr("selected", "selected");
        }
    });
    //get value current status
    $("#status option").each(function () {
        if ($(this).val() == $("#current_status").val()) {
            $(this).attr("selected", "selected");
        }
    });

    //reset
    $("#btn-reset").click(function () {
        $(":input", ".row")
            .not(":button, :submit, :reset, :hidden")
            .val(" ")
            .removeAttr("checked")
            .removeAttr("selected");
        const editorData = editor.setData(" ");
        $("#list-preview-image").html(" ");
        $("#valueUpLoad").val(" ");
    });
    //submit update    
    $("#btn-submit").click(function (e) {
        e.preventDefault();
        Swal.fire({
            title: "Do you want to save the changes?",
            showDenyButton: true,
            showCancelButton: true,
            confirmButtonText: "Save",
            denyButtonText: `Don't save`,
        }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
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
                var status = $('select[name="status"]').val();
                var saleOff = $('input[name="saleOff"]').val();
                var description = $('textarea[name="description"]').val();
                var detail = editorData;               
                var id = $("meta[name='id']").attr("content");               
                var thumbnail = $('#valueUpLoad').val();               
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
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                            "content"
                        ),
                    },
                });
                $.ajax({
                    url: "/admin/mobile/" + id,
                    method: "PUT",
                    data: data,
                    beforeSend: function () {
                        $(document).find("span.error").text("");
                    },
                    success: function (response) {
                        if (response.status == 400) {
                            var icon = 'error';
                            $.each(response.errors, function (prefix, val) {
                                $("span." + prefix + "_error").text(val[0]);
                            });
                            alertAction(response.message,icon)
                        } else {
                            if (response.status == 200) {
                                var icon = 'success';
                                setTimeout(function () {
                                    alertAction(response.message,icon);
                                }, 1500);
                                alertProcessData();
                                setTimeout(function () {
                                    window.location.href =
                                        "/admin/mobile/" + id;
                                }, 3000);
                            }
                            if (response.status == 500) {
                                var icon = 'error';
                                setTimeout(function () {
                                    alertAction(response.message,icon);
                                }, 1500);
                                alertProcessData();
                                return;
                            }
                        }
                    },
                    error: function (response) {},
                });
            } else if (result.isDenied) {
                Swal.fire("Changes are not saved", "", "info");
            }
        });
    });
    // handle delete thumbnail cloudinary
    $(document).on("click", ".btnDeleteImg", function () {
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
                var delete_token = $(this).siblings().attr("delete");
                $(this).parent().remove();
                //ajax
                if (typeof delete_token != "undefined") {
                    removeThumbnailFromCloudinary(delete_token);
                }
                var urlDelete = $(this).siblings().attr("src");
                var arrCurentValueUpLoad = $("#valueUpLoad").val().split(",");
                arrCurentValueUpLoad.pop();
                removeElement(arrCurentValueUpLoad, urlDelete);
                $("#valueUpLoad").val(" ");
                if (arrCurentValueUpLoad.length > 0) {
                    var url = "";
                    for (let i = 0; i < arrCurentValueUpLoad.length; i++) {
                        url += `${arrCurentValueUpLoad[i]}` + ",";                                               
                    }
                    $("#valueUpLoad").val(url);
                }       
                alert($("#valueUpLoad").val())
                Swal.fire("Deleted!", "Your file has been deleted.", "success");
            }
        });
    });
    //remove thumbnail from cloudinary by ajax
    function removeThumbnailFromCloudinary(delete_token) {
        $.ajax({
            url: "https://api.cloudinary.com/v1_1/binht2012e/delete_by_token",
            cache: false,
            method: "POST",
            data: { token: delete_token },
            success: function (result, status, xhr) {
                if (status != "success") {
                    console.log(xhr.status);
                } else {
                    console.log(xhr.status);
                }
            },
        });
    }
    //remove array
    function removeElement(array, elem) {
        var index = array.indexOf(elem);
        if (index > -1) {
            array.splice(index, 1);
        }
    }
     //alert
     function alertAction(message,icon) {
        Swal.fire({
            position: "top-end",
            icon: `${icon}`,
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
});
