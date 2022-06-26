window.addEventListener('DOMContentLoaded', function (e) {
    $('#btn-logout').click(function (e) {
        e.preventDefault();
        Swal.fire({
            title: 'Bạn chắc chắn muốn đăng xuất chứ ?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Xác Nhận'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url:'/auth/adminlogout',
                    method:'POST',
                    success: function (){
                        window.location.href = "/client/page/shop/mobile";
                    }
                })
            }
        })
    })

} )

