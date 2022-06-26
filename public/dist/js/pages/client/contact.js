window.addEventListener('DOMContentLoaded', function () {    
        $('body').addClass('home-page home-01');  
        //process submit button
        $('form[name=frm-contact]').submit(function(e){
            e.preventDefault();
            const name = $('input[name=name]').val();
            const email = $('input[name=email]').val();
            const phone = $('input[name=phone]').val();
            const comment = $('textarea[name=comment]').val();
            let data = {
                'name':name,
                'email':email,
                'phone':phone,
                'comment':comment,
            };            
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url:'/client/page/feedback',
                method:'post',
                data:data,
                beforeSend: function () {
                    $(document).find("span.error").text("");
                },
                success: function(res){
                    if(res.status == 200){                        
                        Swal.fire({
                            icon: 'success',                            
                            text: `${res.message}`,                            
                        })     
                        $('textarea[name=comment]').val(' ');                 
                    }
                    if(res.status == 500){
                        Swal.fire({
                            icon: 'error',                            
                            text: `${res.message}`,                            
                        })
                    }
                    if (res.status == 400) {
                        $.each(res.errors, function (prefix, val) {
                            $("span." + prefix + "_error").text(val[0]);
                        });
                    }
                }
            })
        })    
})
