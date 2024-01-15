
$(document).ready(function () {
    var submit = $("button#tru");
    submit.click(function () {
        if ($('input#soluong').val() >= 2) {
            $('input#soluong').val(parseInt($('input#soluong').val()) - 1);
        } else {
            $('input#soluong').val(parseInt($('input#soluong').val()));
        }
        return false;
    });
});
$(document).ready(function () {
    var submit = $("button#cong");
    submit.click(function () {

        if ($('input#soluong').val() <= 9) {
            $('input#soluong').val(parseInt($('input#soluong').val()) + 1);
        } else {
            $('input#soluong').val(parseInt($('input#soluong').val()));
        }
        return false;
    });
});

$(document).ready(function () {
    var submit = $("input#Apply_Coupon");
    submit.click(function () {
        var code = $('input#Coupon').val();
        let makh = $(this).attr('data-makh')
        // $('span#coupon2').text('Đã áp dụng mã : ' + code);
        var data = {
            functionName: 'check_coupon',
            code: code,
            makh: makh,
        };
        $.ajax({
            url: 'model/database.php',
            type: 'POST',
            data: data,
            dataType: 'json',
            success: function (response) {
                // Kết quả trả về từ hàm PHP
                if (response.res == 'success') {
                    Swal.fire({
                        icon: 'success',
                        title: 'Thông báo phiếu giảm giá',
                        text: response.status,
                        confirmButtonText: 'Xác nhận',
                    })
                    sotien = response.money.replace(/"/g, '');
                    $('span#coupon_apply').text(sotien);
                    var subtotal = $('span#subtotal').text().replace(/,/g, '');
                    var sotien1 = $('span#coupon_apply').text().replace(/,/g, '');
                    var total = (parseInt(subtotal) - parseInt(sotien1)).toLocaleString('vi-VN', { style: 'currency', currency: 'VND' });
                    $('span#total').text(total);
                    $('input#tongtien').val((parseInt(subtotal) - parseInt(sotien1)));
                    $('input#tiensale').val(parseInt(sotien1));
                } else if (response.res == 'warning') {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Thông báo phiếu giảm giá',
                        confirmButtonText: 'Xác nhận',
                        text: response.status,
                    }).then((res) => {
                        if (res.isConfirmed) {
                            location.href = '?view=login';
                        }
                    })
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Thông báo phiếu giảm giá',
                        confirmButtonText: 'Xác nhận',
                        text: response.status,
                    })
                }

            },
            error: function (xhr, status, error) {
                console.error(error); // Xử lý lỗi nếu có
            }
        });
    });
});


$(document).ready(function () {
    function formatNumberWithCommas(number) {
        return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }

    function htmlDetail(data) {
        let html = '';
        let listDetail = data.detail;
        let bill = data.bill;
        html += `<table class="table align-middle mb-0 bg-white table-responsive">`;
        html += `<thead class="bg-light">`;
        html += `<tr>`;
        html += `<th class="fw-bold">Tên sản phẩm</th>`;
        html += `<th class="fw-bold">Kích cỡ</th>`;
        html += `<th class="fw-bold">Màu sắc</th>`;
        html += `<th class="fw-bold">Giá</th>`;
        html += `<th class="fw-bold">Phương thức thanh toán</th>`;
        html += `<th class="fw-bold">Tổng cộng</th>`;
        html += `<th class="fw-bold">Tình trạng đơn hàng</th>`;
        html += `<th class="fw-bold">Ngày đặt</th>`;
        html += `<th class="fw-bold">Ngày giao</th>`;
        html += `</tr>`;
        html += `</thead>`;
        html += `<tbody>`;
        html += `<tr>`;
        html += `<td class="align-middle">`;
        listDetail.forEach((detail) => {
            html += `<div class="d-flex align-items-center">`;
            html += `<div class="ms-2">`;
            html += `<p class="mb-1">${detail.name} x ${detail.quantity}</p>`;
            html += `</div>`;
            html += `</div>`;
        })
        html += `</td>`;
        html += `<td class="align-middle">`;
        listDetail.forEach((detail) => {
            html += `<p class="mb-1">${detail.size}</p>`;
        })
        html += `</td>`;
        html += `<td class="align-middle">`;
        listDetail.forEach((detail) => {
            html += `<p class="mb-1">${detail.color}</p>`;
        })
        html += `</td>`;
        html += `<td class="align-middle">`;
        listDetail.forEach((detail) => {
            html += `<p class=" mb-1">${detail.subtotal}</p>`;
        })
        html += `</td>`;    
        html += `<td class="align-middle">${bill.PhuongThucThanhToan == 1 ? 'Thanh toán khi nhận hàng' : (bill.PhuongThucThanhToan == 2 ? 'Thanh toán bằng MoMo' : 'Thanh toán bằng VNPAY')}</td>`;
        html += `<td class="align-middle">${bill.TongTien}</td>`;
        html += `<td class="align-middle"><span class="badge ${bill.TinhTrang.toLowerCase() == 'hoàn thành' ? 'badge-success' : (bill.TinhTrang.toLowerCase() == 'hủy bỏ' ? 'badge-danger' : 'badge-warning')} px-3 py-2 fs-13 rounded-pill text-white d-inline">${bill.TinhTrang.charAt(0).toUpperCase() + bill.TinhTrang.slice(1)}</span></td>`;
        html += `<td width="150" class="align-middle">${bill.NgayDat}</td>`;
        html += `<td width="150" class="align-middle">${bill.NgayGiao ? bill.NgayGiao : 'Không có'}</td>`;
        html += `</tr>`;
        html += `</tbody>`;
        html += `</table>`;
        return html;
    }

    var submit = $("button#xemthem");
        // console.log('ok');
        submit.click(function () {
            var datas = $('form#load_sp').serialize();
            $.ajax({
                type: 'POST',
                url: 'model/database.php',
                data: datas,
                success: function (data) {
                    if (data == 'false') {
                        alert('Lỗi thử lại sao');
                    } else {
                        $("#data_sp").html(data);

                    }
                }
            });
            $('input#page').val(parseInt($('input#page').val()) + 1);
            return false;
        });
        //thay doi so luong
        $(document).on('change', '.change-quantity', function (e) {
            // e.preventDefault();
            let quantity = parseInt($(this).val());
            let id = $(this).attr('data-id');
            let idSize = $(this).attr('data-size');
            let idColor = $(this).attr('data-color');
            let size = $('.size-' + id + '-' + idSize + '-' + idColor).text();
            let color = $('.color-' + id + '-' + idSize + '-' + idColor).text();
            let price = parseInt($('#price-' + id + '-' + idSize + '-' + idColor).text().replace(/,/g, ''));
            // let total = $('#total-'+id+'-'+idSize+'-'+idColor).text();
            let feeDiscount = parseInt($('#coupon_apply').text().replace(/,/g, ''));
            $.ajax({
                type: 'POST',
                url: 'model/database.php',
                data: {
                    update_cart_product: 1,
                    id: id,
                    quantity: quantity,
                    size: size,
                    color: color,
                },
                dataType: 'json',
                success: function (data) {
                    console.log(data);
                    // console.log(parseInt(data.subtotal));
                    if (data.res == 'success') {
                        let priceUpdate = formatNumberWithCommas(price * quantity);
                        let subTotal = parseInt(data.subtotal);
                        $('#total-' + id + '-' + idSize + '-' + idColor).text(priceUpdate);
                        $('#subtotal').text(formatNumberWithCommas(subTotal));
                        $('#total').text(formatNumberWithCommas(subTotal - feeDiscount));
                    }
                }
            });
        })
        //sao chep ma code giam gia
        $(document).on('click', '.copy-discount', function (e) {
            var code = $(this).closest('.coupon').find('.code-discount').text().trim();
            // console.log(code);
            var blob = new Blob([code], { type: "text/plain" });

            // Tạo một thực thể ClipboardItem từ blob
            var clipboardItem = new ClipboardItem({ "text/plain": blob });

            // Sao chép clipboardItem vào clipboard
            navigator.clipboard.write([clipboardItem])
                .then(function () {
                    alert("Đã sao chép vào clipboard");
                })
                .catch(function (error) {
                    console.error("Lỗi khi sao chép vào clipboard: " + error);
                });
        })
        //xem chi tiet don hang da mua
        $('.open-modal-detail').on('click', function (e) {
            let id = $(this).attr('data-id');
            let tinhtrang = $(this).closest('tr').find('.tinhtrang').attr('data-status');
            let buttonCancel = `<button type="button" class="btn text-capitalize rounded-0 fs-13 btn-outline-danger" data-dismiss="modal">Đóng</button>`;
            if(tinhtrang == 2 || tinhtrang == 3){
            }else{
                buttonCancel += `<button type="submit" class="btn text-capitalize rounded-0 fs-13 border-danger btn-outline-danger">Hủy đơn hàng</button>`
            }
            $('.type-button').html(buttonCancel);
            $('#cancelBill').attr('data-id',id);    
            $.ajax({
                type: 'GET',
                url: 'model/database.php',
                data: {
                    take_bill: 1,
                    id: id,
                },
                dataType: 'json',
                success: function (data) {
                    let html = htmlDetail(data);
                    $('.list-detail').html(html);
                    // console.log(html);
                }
            });
        })
        //huy don hang
        $('#cancelBill').on('submit', function(e){
            e.preventDefault();
            let id = $(this).attr('data-id');
            $.ajax({
                type: 'POST',
                url: 'model/database.php',
                data: {
                    cancel_bill: 1,
                    mahd: id,
                },
                dataType: 'json',
                success: function (data) {
                    // let html = htmlDetail(data);
                    // $('.list-detail').html(html);
                    console.log(data);
                    if(data.res == 'success') alert('Hủy đơn hàng thành công'); location.reload();
                }
            });
        })
        //danh gia sao
        var stars = $('.choose-star');
        var rating = $('.star').data('rating');

        // Thiết lập màu sao khi trang web tải lên
        // setStarsColor();

        // stars.hover(function(){
        //     // Hover vào sao
        //     var value = $(this).data('value');
        //     highlightStars(value);
        //     $('.star').attr('data-rating',value)
        //     // console.log('in',value);
        // }, function(){
        //     var value = $(this).data('value');
        //     // Hover ra khỏi sao
        //     outHighlightStars(value);
        //     $('.star').attr('data-rating',value)
        //     console.log('out',value);
        // });

        stars.click(function(){
            // Click để chọn số sao
            var value = $(this).data('value');
            $('#rating').val(value)
            // console.log(1);
            for(var i = 1; i <= value; i++){
                $('.choose-star[data-value="' + i + '"]').addClass('text-warning').removeClass('text-secondary');
            }
            for(var i = value + 1; i <= 5; i++){
                $('.choose-star[data-value="' + i + '"]').addClass('text-secondary').removeClass('text-warning');
            }
            // rating = value;
            // setStarsColor(rating);
        });

        // function highlightStars(num){
        //     // stars.removeClass('active');
        //     for(var i = 1; i <= num; i++){
        //         $('.choose-star[data-value="' + i + '"]').addClass('text-warning').removeClass('text-secondary');
        //     }
        // }

        // function outHighlightStars(num){
        //     for(var i = num + 1; i <= 5; i++){
        //         $('.choose-star[data-value="' + i + '"]').addClass('text-secondary').removeClass('text-warning');
        //     }
        // }

        // function setStarsColor(rating){
        //     highlightStars(rating);
        // }
    });


function togglePasswordVisibility() {
    var passwordInput = document.getElementById("password");
    var eyeIcon = document.querySelector(".toggle-password svg");

    if (passwordInput.type === "password") {
        passwordInput.type = "text";
        eyeIcon.classList.add("visible");
    } else {
        passwordInput.type = "password";
        eyeIcon.classList.remove("visible");
    }
}
// Khởi tạo bản đồ và đặt tọa độ trung tâm ở Hồ Chí Minh
var map = L.map('map').setView([10.762622, 106.660172], 13);

// Thêm tile layer (hiển thị bản đồ nền)
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors',
    maxZoom: 18,
}).addTo(map);

// Thêm marker (đánh dấu vị trí trên bản đồ)
L.marker([10.762622, 106.660172]).addTo(map)
    .bindPopup('Lac Lac shoes ');

