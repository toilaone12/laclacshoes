<?php
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
        $order=order_product($nn,$dcnn,$sdtnn,$makh,$tt);
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
    $nn=$_SESSION['nguoi_nhan']['fullname'];//người nhận hàng
    $dcnn=$_SESSION['nguoi_nhan']['address']; //địa chỉ người nhận
    $sdtnn=$_SESSION['nguoi_nhan']['phone'];//số điện thoại người nhận
    $makh=$_SESSION['nguoi_nhan']['maKH'];
    $tt=$_SESSION['nguoi_nhan']['tongtien'];
    $email=$_SESSION['nguoi_nhan']['email'];
    $order=sendMail($nn,$dcnn,$sdtnn,$makh,$tt,$email);
    // var_dump($order); die;
    if($order) header('Location: ?view=order-complete');
?>