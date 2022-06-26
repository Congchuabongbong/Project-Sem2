window.addEventListener('DOMContentLoaded', function () {
    $('a.a_detail_order').click(function (e) {
        e.preventDefault();
        var id = $(this).attr('id_attr');
        let data = {'id': id};
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: '/order/detail/' + id,
            method: 'get',
            data: data,
            success: function (res) {
                if (res.status == 200) {
                    var order = res.order;
                    var strCheckout = 'null';
                    if (order.checkOut == 1) {
                        strCheckout = 'Đã thanh toán';
                    }
                    if (order.checkOut == 0) {
                        strCheckout = 'Chưa thanh toán';
                    }



                    var order_details = res.orderDetails;
                    var resultHTML =
                        `<h4><b>Người Nhận:</b> ${order.name}</h4>` +
                        `<h4><b>Địa chỉ:</b> (${order.address_detail}), ${order.ward}, ${order.district}, ${order.province}</h4>` +
                        `<h4><b>Số điện thoại:</b> ${order.phone}</h4>` +
                        `<h4><b>Tống giá tiền đơn hàng:</b> ${convertMoneyFormat(order.totalPrice)}</h4>` +
                        `<h4><b>Trạng thái thanh toán:</b> ${strCheckout}</h4>` +
                        `<h4><b>Ngày đặt hàng:</b> ${convertDateFormat(order.created_at)}</h4>`;
                    resultHTML += '<table class="table table-dark">\n' +
                        '  <thead>\n' +
                        '    <tr>\n' +
                        '      <th scope="col">#</th>\n' +
                        '      <th scope="col">Sản phẩm</th>\n' +
                        '      <th scope="col">Số tiền</th>\n' +
                        '      <th scope="col">Số lượng</th>\n' +
                        '    </tr>\n' +
                        '  </thead>\n' +
                        '  <tbody>'

                    var i = 1;
                    order_details.forEach(odt => {
                        resultHTML += `<tr>
                                            <th scope="row">${i}</th>
                                            <td>${odt.name}</td>
                                            <td>${convertMoneyFormat(odt.quantity * odt.unitPrice * (1 - odt.discount))}</td>
                                            <td>${odt.quantity}</td>
                                       </tr>`
                        i++;
                    })
                    resultHTML += '  </tbody>\n' +
                        '</table>'
                    $('#detailOrder').html(resultHTML);
                }
                if (res.status == 400) {
                    $('#detailOrder').html(`<h2>${res.message}</h2>>`);
                }
            }
        })
    })

    function convertDateFormat(date_input){
        return date_input.split("T")[0]
    }

    function convertMoneyFormat(money){
        // return (money).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
        const formatter = new Intl.NumberFormat('vi-VN', {
            style: 'currency',
            currency: 'VND',
            minimumFractionDigits: 0
        })
        return formatter.format(money)
    }
})
