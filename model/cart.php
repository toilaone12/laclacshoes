<div class="row">
    <div class="col-12">
        <center><img class="loading-cart" src="webroot/image/loader.gif" alt=""></center>
    </div>
</div>
<?php
if (isset($_POST['addtocart'])) {
    $idproduct = $_POST['idproduct'];
    $soluong = $_POST['soluong'];
    $size = isset($_POST['size']) ? $_POST['size'] : 0;
    $mau = isset($_POST['mau']) ? $_POST['mau'] : 0;
    $dongia = $_POST['dongia'];
    // var_dump($dongia); die;
    $error = array();
    if (!$size) $error['size'] = ['alert' => 'phải chọn kích cỡ sản phẩm'];
    if (!$mau) $error['color'] = ['alert' => 'phải chọn màu sắc sản phẩm'];
    if (count($error) == 0) {
        $soluongkho = check_product_soluong($idproduct, $size, $mau);
        $one = product_detail_name($idproduct);
        // var_dump($one); die;
        if ($soluongkho >= $soluong) {
            $new_cart = array(array('MaSP' => $idproduct, 'TenSP' => $one, 'SoLuong' => $soluong, 'Size' => $size, 'Mau' => $mau, 'DonGia' => $dongia));
            if (isset($_SESSION['cart_product']) && $_SESSION['cart_product']) {
                $found = true; // check cart
                $alerts = array();
                foreach ($_SESSION['cart_product'] as $item_cart) {
                    $product = product_detail_name($item_cart['MaSP']);
                    if (($item_cart['MaSP'] === $idproduct) and ($item_cart['Size'] === $size) and ($item_cart['Mau'] === $mau)) {
                        if (($item_cart['SoLuong'] + $soluong) <= $soluongkho) {
                            $cart[] = array('MaSP' => $item_cart['MaSP'], 'TenSP' => $product, 'SoLuong' => (($item_cart['SoLuong'] + $soluong)), 'Size' => $item_cart['Size'], 'Mau' => $item_cart['Mau'], 'DonGia' => $item_cart['DonGia']);
                            // $found=true;
                            $alerts[] = ['res' => 'success', 'status' => 'update', 'title' => 'Đã cập nhật số lượng sản phẩm'];
                        } else {
                            $cart[] = array('MaSP' => $item_cart['MaSP'], 'TenSP' => $product, 'SoLuong' => ($item_cart['SoLuong']), 'Size' => $item_cart['Size'], 'Mau' => $item_cart['Mau'], 'DonGia' => $item_cart['DonGia']);
                            // $found=true;
                            $alerts[] = ['res' => 'error', 'title' => 'Bạn đã có ' . $item_cart['SoLuong'] . ' trong khi kho chỉ còn ' . $soluongkho . ' sản phẩm'];
                            // $alert = 'Bạn đã có '.$item_cart['SoLuong'].' trong khi kho chỉ còn '.$soluongkho.' sản phẩm';
                        }
                    } else {
                        $cart[] = array('MaSP' => $item_cart['MaSP'], 'TenSP' => $product, 'SoLuong' => ($item_cart['SoLuong']), 'Size' => $item_cart['Size'], 'Mau' => $item_cart['Mau'], 'DonGia' => $item_cart['DonGia']);
                        $alerts[] = ['res' => 'success', 'status' => 'add', 'title' => 'Đã thêm sản phẩm vào giỏ hàng'];
                    }
                }
                $errorAlert = '';
                foreach ($alerts as $alert) {
                    if ($alert['res'] == 'error') {
                        $errorAlert .= $alert['title'];
                        $found = false;
                    }
                }
                if ($found == false) {
                    header('location:?view=product-detail&id=' . $idproduct . '&alert=' . $errorAlert);
                } else {
                    $sucessAlert = '';
                    foreach ($alerts as $alert) {
                        if ($alert['res'] == 'success') {
                            if ($alert['status'] == 'add') {
                                $_SESSION['cart_product'] = array_merge($cart, $new_cart);
                            } else {
                                $_SESSION["cart_product"] = $cart;
                            }
                            $sucessAlert = 'Cập nhật giỏ hàng thành công';
                        }
                    }
                    // var_dump($cart);die;
                    header('location:?view=cart&alert=' . $sucessAlert);
                }
            } else {
                $_SESSION['cart_product'] = $new_cart;
                $alert = 'Đã thêm vào giỏ hàng';
                header('location:?view=cart&alert=' . $alert);
            }
        } else {
            $alert = 'Trong kho chỉ còn ' . $soluongkho . ' sản phẩm';
            header('location:?view=product-detail&id=' . $idproduct . '&alert=' . $alert);
        }
    } else {
        $alert = isset($error['size']['alert']) ? ucfirst($error['size']['alert']) : '';
        $alert .= isset($error['size']['alert']) && isset($error['color']['alert']) ? ' và ' . $error['color']['alert'] : (isset($error['color']['alert']) ? ucfirst($error['color']['alert']) : '');
        header('location:?view=product-detail&id=' . $idproduct . '&alert=' . $alert);
    }
}

if (isset($_POST['delete_cart_product'])) {
    $key = $_POST['delete_cart_product'];
    // var_dump(($_SESSION['cart_product'])); die;
    unset($_SESSION['cart_product'][$key]);
    if (count($_SESSION['cart_product']) == 0) {
        unset($_SESSION['cart_product']);
    }
    $alert = 'Đã xóa thành công';
    header('location:?view=cart&alert=' . $alert);
}

require 'webroot/PHPMailer/src/Exception.php';
require 'webroot/PHPMailer/src/PHPMailer.php';
require 'webroot/PHPMailer/src/SMTP.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function sendMail($nn,$dcnn,$sdtnn,$makh,$tt,$email){
    $table='';
    foreach($_SESSION['cart_product'] as $item_cart) { $product=mysqli_fetch_array(product($item_cart['MaSP'])); 
        $number = str_replace(',', '', $item_cart['DonGia']);  $dongia=number_format($number*$item_cart['SoLuong']);
        $table=$table. '
        <tr>
        <td>'.$product['TenSP'].'</td>
        <td>'.$item_cart['SoLuong'].'</td> 
        <td>'.$dongia.'</td>
        </tr>';
    } 
    $message = '
        <html>
        <head>
        <title>Đơn hàng của bạn</title>
        <style>
            table {
                font-family: Arial, sans-serif;
                font-size: 14px;
                background-color: #f7f7f7;
                width: 100%;
            }
            th {
                background-color: #333;
                color: #fff;
                font-weight: bold;
                padding: 10px;
            }
            table, th, td {
                border: 1px solid black;
                border-collapse: collapse;
            }
            th, td {
                text-align: center;
                padding: 10px;
            }
        </style>
        </head>
        <body>
        <p>Cảm ơn bạn đã đặt hàng.</p>
        <table>
        <tr>
        <th>Sản phẩm</th>
        <th>Số lượng</th>
        <th>Giá</th>
        </tr>'.$table.'
        </table>
        <p>Tổng cộng: '. number_format($tt).' đ</p>
        </body>
        </html>';
    $order=order_product($nn,$dcnn,$sdtnn,$makh,$tt,1);
    // return $order;
    if($order){
        $mail = new PHPMailer(true);
        $mail->isSMTP();                                            // sử dụng SMTP
        $mail->Host       = 'smtp.gmail.com';                       // SMTP server
        $mail->SMTPAuth   = true;                                   // bật chế độ xác thực SMTP
        $mail->Username   = 'tringuyen25081998@gmail.com';        // tài khoản đăng nhập SMTP
        $mail->Password   = 'hhyuyeufiywdefof';                         // mật khẩu đăng nhập SMTP
        $mail->SMTPSecure = 'tls';                                  // giao thức bảo mật TLS
        $mail->Port       = 587;
        $mail->setFrom('tringuyen25081998@gmail.com', 'Lac Lac Shoes');          // địa chỉ email và tên người gửi
        $mail->addAddress($email, $nn); // địa chỉ email và tên người nhận
        $mail->Subject = ' Lac Lac Shoes - DON HANG CUA BAN';                               // tiêu đề email
        $mail->Body    = $message;     
        $mail->isHTML(true);                            // định dạng email dưới dạng HTML
        // $mail->addAttachment('path/to/file.pdf');       // đính kèm tập tin PDF
        if ($mail->send()) {
            header('location:?view=order-complete');
        } else {
            echo 'Email could not be sent';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } 
    }
}

if (isset($_POST['cod'])) {
    // var_dump($_SESSION['cart_product']); die;
    $nn = $_POST['fname']; //người nhận hàng
    $dcnn = $_POST['address']; //địa chỉ người nhận
    $sdtnn = $_POST['phone']; //số điện thoại người nhận
    $email = $_POST['email']; //email người nhận
    $kh = $_SESSION['laclac_khachang'];
    $makh = $kh['MaKH'];
    $tt = $_POST['tongtien'];
    $send = sendMail($nn, $dcnn, $sdtnn, $makh, $tt, $email);
    // var_dump($send); die;
} else if (isset($_POST['momo'])) {
    // echo 'thanh toán bằng momo';
    // var_dump($_POST); die;
    function execPostRequest($url, $data)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt(
            $ch,
            CURLOPT_HTTPHEADER,
            array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data)
            )
        );
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        //execute post
        $result = curl_exec($ch);
        //close connection
        curl_close($ch);
        return $result;
    }
    $kh = $_SESSION['laclac_khachang'];
    $_SESSION['nguoi_nhan'] = [
        'email' => $_POST['email'],
        'fullname' => $_POST['fname'],
        'address' => $_POST['address'],
        'phone' => $_POST['phone'],
        'maKH' => $kh['MaKH'],
        'tongtien' => $_POST['tongtien']
    ];
    $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";
    $partnerCode = 'MOMOBKUN20180529';
    $accessKey = 'klm05TvNBzhg7h7j';
    $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';

    $orderInfo = "Thanh toán qua MoMo";
    $amount = $_POST['tongtien'];
    $orderId = time() . "";
    $redirectUrl = "http://localhost/laclacshoes/?view=online&phuongthuc=2";
    $ipnUrl = "http://localhost/laclacshoes/?view=online";
    $extraData = "";

    $requestId = time() . "";
    $requestType = "payWithATM";
    // $requestType = "captureWallet";
    //$extraData = ($_POST["extraData"] ? $_POST["extraData"] : "");
    //before sign HMAC SHA256 signature
    $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
    $signature = hash_hmac("sha256", $rawHash, $secretKey);
    $data = array(
        'partnerCode' => $partnerCode,
        'partnerName' => "Test",
        "storeId" => "MomoTestStore",
        'requestId' => $requestId,
        'amount' => $amount,
        'orderId' => $orderId,
        'orderInfo' => $orderInfo,
        'redirectUrl' => $redirectUrl,
        'ipnUrl' => $ipnUrl,
        'lang' => 'vi',
        'extraData' => $extraData,
        'requestType' => $requestType,
        'signature' => $signature
    );
    $result = execPostRequest($endpoint, json_encode($data));
    $jsonResult = json_decode($result, true);  // decode json
    // var_dump($jsonResult); die;
    //Just a example, please check more in there

    header('Location: ' . $jsonResult['payUrl']);
} elseif (isset($_POST['vnpay'])) {
    // var_dump($_POST['tongtien']); die;
    $kh = $_SESSION['laclac_khachang'];
    $_SESSION['nguoi_nhan'] = [
        'email' => $_POST['email'],
        'fullname' => $_POST['fname'],
        'address' => $_POST['address'],
        'phone' => $_POST['phone'],
        'maKH' => $kh['MaKH'],
        'tongtien' => $_POST['tongtien']
    ];
    $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
    $vnp_Returnurl = "http://localhost/laclacshoes/?view=online&phuongthuc=3";
    $vnp_TmnCode = "24J0WB02"; //Mã website tại VNPAY 
    $vnp_HashSecret = "DIWYMSPOCNFUWHBRGHFRYKWEDPKOSPXK"; //Chuỗi bí mật

    $vnp_TxnRef = rand(0000,9999); //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
    $vnp_OrderInfo = 'Thanh toán bằng VNPAY';
    $vnp_OrderType = 'billpayment';
    $vnp_Amount = 1000 * 100;
    $vnp_Locale = 'vn';
    $vnp_BankCode = 'NCB';
    $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
    //Add Params of 2.0.1 Version
    $inputData = array(
        "vnp_Version" => "2.1.0",
        "vnp_TmnCode" => $vnp_TmnCode,
        "vnp_Amount" => $vnp_Amount,
        "vnp_Command" => "pay",
        "vnp_CreateDate" => date('YmdHis'),
        "vnp_CurrCode" => "VND",
        "vnp_IpAddr" => $vnp_IpAddr,
        "vnp_Locale" => $vnp_Locale,
        "vnp_OrderInfo" => $vnp_OrderInfo,
        "vnp_OrderType" => $vnp_OrderType,
        "vnp_ReturnUrl" => $vnp_Returnurl,
        "vnp_TxnRef" => $vnp_TxnRef,
    );

    if (isset($vnp_BankCode) && $vnp_BankCode != "") {
        $inputData['vnp_BankCode'] = $vnp_BankCode;
    }
    if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
        $inputData['vnp_Bill_State'] = $vnp_Bill_State;
    }

    //var_dump($inputData);
    ksort($inputData);
    $query = "";
    $i = 0;
    $hashdata = "";
    foreach ($inputData as $key => $value) {
        if ($i == 1) {
            $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
        } else {
            $hashdata .= urlencode($key) . "=" . urlencode($value);
            $i = 1;
        }
        $query .= urlencode($key) . "=" . urlencode($value) . '&';
    }

    $vnp_Url = $vnp_Url . "?" . $query;
    if (isset($vnp_HashSecret)) {
        $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret); //  
        $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
    }
    $returnData = array(
        'code' => '00', 'message' => 'success', 'data' => $vnp_Url
    );
    // var_dump($vnp_Url); die;
    header('Location: ' . $vnp_Url);
    die();
    // if (isset($_POST['vnpay'])) {
    // } else {
    //     echo json_encode($returnData);
    // }
}

?>