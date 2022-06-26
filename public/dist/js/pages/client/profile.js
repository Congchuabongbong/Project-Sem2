$(document).ready(function () {
    var readURL = function (input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('.avatar').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
    $(".file-upload").on('change', function () {
        readURL(this);
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
                document.getElementById("list-preview-image").innerHTML = '';
                document.getElementById("avatar").value = '';
                document.getElementById("avatar").value = `${result.info.secure_url}`;
                // alert(document.getElementById("valueUpLoad").value);
                document.getElementById("list-preview-image").innerHTML = `
               <span class="m-2" id="preview-image" style="position: relative; with:100px; display:inline-block;">
                   <img src="${result.info.secure_url}" class="img-thumbnail img-bordered" style="width: 400px; ml-2" delete="${result.info.delete_token}">
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
            // document.getElementById("list-preview-image").innerHTML = '';
            // document.getElementById("avatar").value = '';
            myWidget_thumbnail.open();
        },
        false
    );
    // handle delete thumbnail cloudinary
    $(document).on("click", ".btnDeleteImg", function (e) {
        e.preventDefault();
        var btnDeleteImg = $(this);
        Swal.fire({
            title: "Bạn chắc chứ?",
            text: "Thay đổi này sẽ không được lưu lại!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Xóa thay đổi!",
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

    //process submit button
    $('#btnSaveEdit').click(function (e) {
        e.preventDefault();
        const id = $('input[name=id]').val();
        const fullName = $('input[name=fullName]').val();
        const phone = $('input[name=phone]').val();
        const address = $('input[name=address]').val();
        const description = $('input[name=description]').val();
        const avatar = $('input[name=avatar]').val();
        var data1 = {
            'id': id,
            'fullName': fullName,
            'phone': phone,
            'address': address,
            'description': description,
            'avatar': avatar
        };
        console.log(data1)
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url:'/client/page/user/'+id,
            method:'PUT',
            data:data1,
            success: function(res){
                if(res.status === 200){
                    Swal.fire({
                        icon: 'success',
                        // title: 'Oops...',
                        text: 'Update successfully !!!',
                        // footer: '<a href="">Why do I have this issue?</a>'
                    })
                    setTimeout(function() {
                        window.location.href = "/client/page/user/"+res.id;
                    },2000)

                }
                if(res.status === 500){
                    Swal.fire({
                        icon: 'error',
                        // title: 'Oops...',
                        text: 'Update failed !!!',
                        // footer: '<a href="">Why do I have this issue?</a>'
                    })
                }
                if(res.status === 404){
                    Swal.fire({
                        icon: 'error',
                        // title: 'Oops...',
                        text: 'Something went wrong',
                        // footer: '<a href="">Why do I have this issue?</a>'
                    })
                }
            }
        })
    })
});
