window.addEventListener('DOMContentLoaded', function () {
    $('#btnSubmit').click(function (e) {
        e.preventDefault();
        var email = $('input[name=email]').val();
        var password = $('input[name=password]').val();
        let data1 = {
            'email': email,
            'password': password
        }
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: '/client/page/login',
            method: 'POST',
            data: data1,
            success: function (response) {
                if(response.status == 200){
                    window.location.href = "/client/page/shop/mobile";
                }else{
                    Swal.fire({
                        position: 'top-end',
                        icon: 'error',
                        title: 'Tài khoản hoặc mật khẩu không đúng',
                        showConfirmButton: false,
                        timer: 1500
                    })
                }
            }
        })
    })
})
