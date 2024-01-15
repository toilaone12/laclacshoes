<?php
// kết nối database 
    $servername = "localhost";
    $database = "laclacshoes";
    $username = "root";
    $password = "";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $database);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
   
// -------------------------
function selectdata($sql)
{
    global $conn;
    $retval = mysqli_query(  $conn ,$sql);  
    return $retval;
    mysqli_close($conn);
}
// login 
function checklogin($email,$password){
    global $conn;
    $sql="SELECT * FROM `khachhang` WHERE Email= '$email' AND MatKhau = '$password'";
    $resulf=mysqli_query($conn,$sql);
    $count=mysqli_num_rows($resulf); 
    if($count==0){
        return false;
      }else{
        return $resulf;
      }     
    mysqli_close($conn);
}
// -------------------------
// ------------------------------------------ PRODUCT MODEL----------------------
// lấy danh sách sản phẩm
function productAll(){
  global $conn;
  $sql=" SELECT * FROM `sanpham`  limit 12" ;
  $resulf=mysqli_query($conn,$sql);
  $count=mysqli_num_rows($resulf);    
  if($count==0){
      return false;
    }else{
      return  $resulf;
    }     
  mysqli_close($conn);
}
// lấy danh sách sản phẩm random
function product_rand(){
  global $conn;
  $sql=" SELECT * FROM `sanpham` ORDER BY rand() limit 4" ;
  $resulf=mysqli_query($conn,$sql);
  $count=mysqli_num_rows($resulf);    
  if($count==0){
      return false;
    }else{
      return  $resulf;
    }     
  mysqli_close($conn);
}
// tìm kiếm sản phẩm 
function product_search($key){
  global $conn;
  $sql="SELECT * FROM `sanpham` WHERE `TenSP`  LIKE N'%".$key."%' ";
  $resulf=mysqli_query($conn,$sql);
  $count=mysqli_num_rows($resulf);    
  if($count==0){
      return false;
    }else{
      return  $resulf;
    }     
  mysqli_close($conn);
}
// lấy 1 product 
function product($id){
  global $conn;
  $sql="SELECT * FROM sanpham WHERE `MaSP` = $id";
  $resulf=mysqli_query($conn,$sql);
  $count=mysqli_num_rows($resulf);    
  if($count==0){
      return false;
    }else{
      return  $resulf;
    }     
  mysqli_close($conn);
}
// tính sản phẩm khuyến mãi
function price_sale($id,$gia){
  global $conn;
  $a=0; $b=0;$tong=0;
  date_default_timezone_set('Asia/Ho_Chi_Minh');$date=getdate();
	$ngay=$date['year']."-".$date['mon']."-".($date['mday']);
 
  $km="SELECT * FROM `sanphamkhuyenmai` WHERE `MaSP`=".$id;
  $query_km=mysqli_query($conn,$km);
  while ($kq_km=mysqli_fetch_array($query_km)) {
    $km1="SELECT * FROM `khuyenmai` WHERE `MaKM`=".$kq_km['MaKM']." and NgayBD <='".$ngay."' and NgayKT >='".$ngay."'";
      $query_km1=mysqli_query($conn,$km1);
      while ($kq_km=mysqli_fetch_array($query_km1)) { 
           if(isset($kq_km['KM_PT'])){ $b=$b+($kq_km['KM_PT']);} 
           if(isset($kq_km['TienKM'])){ $a=$a+($kq_km['TienKM']);} 				            	
      }	
  }
  if ($a!==0 && $b!==0) {
    return  $tong = $gia - $a - ($gia*$b/100);
  }elseif($b==0){
    return $tong=$gia-$a;
  }elseif($a==0){
    return $tong=$gia-($gia*$b/100);
  }else{
    return $gia;
  }
  mysqli_close($conn);
}
// lấy  product detail
function product_detail_color($id){
  global $conn;
  $sql="SELECT  DISTINCT MaMau FROM `chitietsanpham` WHERE  `MaSP` = $id";
  $resulf=mysqli_query($conn,$sql);
  $count=mysqli_num_rows($resulf);    
  if($count==0){
      return false;
    }else{
      return  $resulf;
    }     
  mysqli_close($conn);
}
function product_detail_size($id){
  global $conn;
  $sql="SELECT  DISTINCT MaSize FROM `chitietsanpham` WHERE  `MaSP` = $id";
  $resulf=mysqli_query($conn,$sql);
  $count=mysqli_num_rows($resulf);    
  if($count==0){
      return false;
    }else{
      return  $resulf;
    }     
  mysqli_close($conn);
}
function product_detail_image($id){
  global $conn;
  $sql="SELECT  * FROM `anhsp` WHERE  `MaSP` = $id";
  $resulf=mysqli_query($conn,$sql);
  $count=mysqli_num_rows($resulf);    
  if($count==0){
      return false;
    }else{
      return  $resulf;
    }     
  mysqli_close($conn);
}

function product_detail_name($id){
  global $conn;
  $sql="SELECT TenSP FROM `sanpham` WHERE  `MaSP` = $id";
  $result=mysqli_query($conn,$sql);
  $count=mysqli_num_rows($result);    
  if($count==0){
      return false;
    }else{
      $row = mysqli_fetch_assoc($result);
      return $row['TenSP'];
    }     
  mysqli_close($conn);
}
// check số lượgn prodcut
function check_product_soluong($id,$size,$mau){
  global $conn;
  $sql="select SoLuong from chitietsanpham where MaSP=".$id." and MaMau='".$mau."' and MaSize=".$size;
  // return $sql;
  $resulf = mysqli_query($conn ,$sql);  
  $count=mysqli_num_rows($resulf);        
  if($count==0){
    return $soluongkho=0;
  }else{
    $soluongkho=mysqli_fetch_array($resulf);
    return  $soluongkho['SoLuong'];
  }     
mysqli_close($conn);
}
// check phiếu giảm giá
if (isset($_POST["functionName"])) {
  if ($_POST["functionName"] == "check_coupon") {
    $code = $_POST["code"];
    $makh = $_POST["makh"];
    $result = check_coupon($code,$makh);
    if($result['res'] == 'success'){
      session_start();
      $_SESSION['coupon'] = [
        'maphieu' => $result['mapgg'],
        'makh' => $result['makh'],
      ];
    }
    echo json_encode($result);
  }
}
function check_coupon($code,$makh){
  global $conn;
  if($makh){
    $sql="SELECT * FROM `phieugiamgia` WHERE `CodePhieu` = '$code' AND ThoiHan >= '".date('Y-m-d')."'";
    // return $sql;
    $resulf = mysqli_query($conn ,$sql);          
    if($resulf->num_rows == 0){
      return ['res' => 'error', 'status' => 'Bạn hiện tại không có phiếu giảm giá này hoặc đã hết hạn sử dụng phiếu!', 'money' => 0];
    }else{
      // var_dump($resulf); die;
      $coupon = mysqli_fetch_assoc($resulf);
      $id = $coupon['MaPGG'];
      $sqlCheck = "SELECT * FROM `khachhangphieugiamgia` WHERE `MaPGG` = $id AND `MaKH` = $makh";
      $rsCheck = mysqli_query($conn,$sqlCheck);
      // var_dump($rsCheck=); die;
      if($rsCheck->num_rows != 0){
        return ['res' => 'success', 'status' => 'Áp dụng mã thành công!', 'money' => number_format( $coupon['SoTien']), 'makh' => $makh, 'mapgg' => $id];
      }else{
        return ['res' => 'error', 'status' => 'Bạn hiện tại không có mã này!', 'money' => 0, 'makh' => $makh, 'maphieu' => $id];
      }
    }     
    mysqli_close($conn);
  }else{
    return ['res' => 'warning', 'status' => 'Bạn cần phải đăng nhập mới áp dụng được mã khuyến mãi', 'money' => 0];
  }
}
function get_coupon(){
  global $conn;
  $sql="SELECT * FROM `phieugiamgia` WHERE ThoiHan >= '".date('Y-m-d')."'";
  $resulf = mysqli_query($conn ,$sql);  
  $count=mysqli_num_rows($resulf);        
  if($count==0){
    return false;
  }else{
    return $resulf;
  }     
mysqli_close($conn);
}
function get_coupon_customer($mapgg,$makh){
  global $conn;
  $sql="SELECT * FROM `khachhangphieugiamgia` WHERE `MaPGG` = $mapgg AND `MaKH` = $makh";
  // return $sql;
  $resulf = mysqli_query($conn ,$sql);  
  $count=mysqli_num_rows($resulf);        
  if($count==0){
    return false;
  }else{
    return $resulf;
  }      
mysqli_close($conn);
}
// các bình luận product
function product_review($id){
  global $conn;
  $sql="SELECT * FROM `binhluan` WHERE `MaSP`=$id ORDER BY ThoiGian DESC ";
  $resulf = mysqli_query($conn ,$sql);       
  $count=mysqli_num_rows($resulf);    
  if($count==0){
      return false;
    }else{
      return  $resulf;
    }     
  mysqli_close($conn);

}
// thêm bình luận product
function product_addtoreview($masp,$id,$sosao,$nd){
  global $conn;
  $sql="INSERT INTO `binhluan`( `MaSP`, `MaKH`, `SoSao`, `NoiDung`) VALUES('$masp',".$id.",'$sosao','$nd')";
  $resulf = mysqli_query($conn ,$sql);  
  if($resulf){
      return true;
    }else{
      return  false;
    }     
  mysqli_close($conn);
}
/////// tải thêm nhiều sản phẩm với ajax
if (isset($_POST['page'])==true) {
  $page = $_POST['page']*12;
  $row_count = $_POST['rowCount'];
  $sql="SELECT * FROM `sanpham`  limit 12,".$page;
  $res=selectdata($sql); ?>
  <div class="row pad-dt"><?php  while( $row=mysqli_fetch_array($res)){ ?>
    <div class="col-3 col-dt">
      <a href="?view=product-detail&id=<?php echo $row['MaSP'] ?>">
        <div class="item">
          <div class="product-lable">
            <?php $price_sale=price_sale($row['MaSP'],$row['DonGia']); if($price_sale < $row['DonGia']) { 
              echo '<span>Giảm '.number_format( $row['DonGia'] - $price_sale).'đ </span>';}?>
          </div>
          <div><img src="webroot/image/sanpham/<?php echo $row['AnhNen']; ?>" class="img-fluid image-product"></div>
          <div class="item-name"><p> <?php echo $row['TenSP']; ?> </p></div>
          <div class="item-price">
            <p> <?php echo number_format($price_sale,0).'đ'; ?> </p>
            <h6> <?php if(number_format($row['DonGia']) !== number_format($price_sale)) {echo number_format($row['DonGia']).'đ';} ;  ?> </h6> 
          </div>
        </div>
      </a>
      </div><?php }  ?>
  </div>
<?php
};


// ------------------------------------------ Category MODEL----------------------
// danh mục 
function categorys(){
  global $conn;
  $sql=" SELECT * FROM `nhacc` ";
  $resulf=mysqli_query($conn,$sql);
    $count=mysqli_num_rows($resulf);    
    if($count==0){
        return false;
      }else{
        return  $resulf;
      }     
    mysqli_close($conn);
}
// lấy danh sách sản phẩm theo danh mục
function product_category($id){
  global $conn;
  $sql=" SELECT * FROM `sanpham` where MaNCC = $id" ;
  $resulf=mysqli_query($conn,$sql);
  $count=mysqli_num_rows($resulf);    
  if($count==0){
      return false;
    }else{
      return  $resulf;
    }     
  mysqli_close($conn);
}

// -------------------------------------------------------------------------------
// ------------------------------------------ card MODEL----------------------
// xử lý đặt hàng
function handleCoupon($makh,$maphieu){
  global $conn;
  $sqlHandle = "DELETE FROM `khachhangphieugiamgia` WHERE MaKH = $makh AND MaPGG = $maphieu";
  $rsHandle = mysqli_query($conn, $sqlHandle);
  $sqlUpdate = "UPDATE `phieugiamgia` SET `SoLuong`=(`SoLuong` - 1) WHERE MaPGG = $maphieu";
  $rsUpdate = mysqli_query($conn, $sqlUpdate);
  if($rsHandle && $rsUpdate){
    return true;
  }else{
    return false;
  }
}

function order_product($nn,$dcnn,$sdtnn,$makh,$tt,$phuongthuc){
  global $conn;
  $sql="INSERT INTO `hoadon`(`MaKH`, `PhuongThucThanhToan`, `TinhTrang`, `TongTien`) VALUES ($makh,$phuongthuc,N'chưa duyệt',$tt)";
  $resulf = mysqli_query($conn ,$sql); 
  if($resulf){
    $sql2="select MaHD from hoadon where MaKH=$makh and TongTien=$tt ORDER BY MaHD DESC limit 1";
    $rs2=mysqli_query($conn,$sql2);
    $kq2=mysqli_fetch_array($rs2);$mahd=$kq2['MaHD'];
    foreach ($_SESSION['cart_product'] as $item) {
      $DonGia = str_replace(',', '', $item['DonGia']);
      $ttt=($item['SoLuong']* $DonGia);
      $masp=$item['MaSP']; $sl=$item['SoLuong']; $dg=$DonGia; $mamau=$item['Mau']; $size=$item['Size'];
      $sql3="INSERT INTO `chitiethoadon`(`MaHD`, `MaSP`, `SoLuong`, `DonGia`, `ThanhTien`, `Size`, `MaMau`) VALUES($mahd,$masp,$sl,$dg,$ttt,$size,'$mamau')";
      $rs3=mysqli_query($conn,$sql3);
      $sql_sl="UPDATE `chitietsanpham` SET `SoLuong`=(`SoLuong`-'$sl') WHERE `MaSP`='$masp' and `MaSize`='$size' and `MaMau`='$mamau'";
      $rs_sl=mysqli_query($conn,$sql_sl);
    }
    if($rs3){
      if($rs_sl){
        $coupon = $_SESSION['coupon'];
        if(isset($coupon)){
          $makh = $coupon['makh'];
          $maphieu = $coupon['maphieu'];
          $handle = handleCoupon($makh,$maphieu);
          if($handle){
            unset($_SESSION['coupon']);
          }
        }
        $sql4="INSERT INTO `nguoinhan`(`MaHD`, `TenNN`, `DiaChiNN`, `SDTNN`) VALUES($mahd,'$nn','$dcnn',$sdtnn)";
        $rs4=mysqli_query($conn,$sql4);
        if($rs4){
          unset($_SESSION['cart_product']);
          return true;
        }else{
          return false;
        }
      }	
    }
  }
}
// -------------------------------------------------------------------------------
// ------------------------------------------ user MODEL----------------------
// đăng ký mới
function newUser($name,$email,$sdt,$address,$password){
  global $conn;
  $sql="INSERT INTO `khachhang`( `TenKH`, `Email`, `SDT`, `DiaChi`, `MatKhau`) VALUES ('$name','$email','$sdt','$address','$password')";
  $resulf=mysqli_query($conn,$sql);
  if($resulf){
      return true;
    }else{
      return false;
    }     
  mysqli_close($conn);
}
// -------------------------
// select khách hàng
function selectKH($id){
  global $conn;
  $sql="SELECT * FROM khachhang WHERE MaKH = $id";
  $resulf=mysqli_query($conn,$sql);
  $count=mysqli_num_rows($resulf); 
  if($count==0){
      return false;
    }else{
      return mysqli_fetch_array($resulf);
    }     
  mysqli_close($conn);
}
// -------------------------

// update khách hàng
function update_user($id,$ten,$sdt,$dc,$matkhau){
  global $conn;
  $sql="UPDATE `khachhang` SET `TenKH`='$ten',`SDT`=$sdt,`DiaChi`='$dc',`MatKhau`='$matkhau' WHERE `MaKH`=$id";
  $resulf=mysqli_query($conn,$sql);
  return $resulf;
  mysqli_close($conn);
}
// -------------------------
// đơn hàng của khách hàng
function bill_user($id){
  global $conn;
  $sql="SELECT * FROM `hoadon` WHERE MaKH = $id ORDER BY NgayDat DESC";
  // return $sql;
  $resulf=mysqli_query($conn,$sql);
  $count=mysqli_num_rows($resulf); 
  if($count==0){
    return false;
  }else{
    return $resulf;
  }     
  mysqli_close($conn);
}

function one_bill($id){
  global $conn;
  $sql="SELECT * FROM `hoadon` WHERE MaHD = $id ORDER BY NgayDat DESC";
  // return $sql;
  $resulf=mysqli_query($conn,$sql);
  $count=mysqli_num_rows($resulf); 
  if($count==0){
    return false;
  }else{
    return mysqli_fetch_assoc($resulf);
  }     
  mysqli_close($conn);
}


function get_product($masp){
  global $conn;
  $sql="SELECT * FROM `sanpham` WHERE MaSP = $masp";
  // return $sql;
  $resulf=mysqli_query($conn,$sql);
  $count=mysqli_num_rows($resulf); 
  if($count==0){
    return false;
  }else{
    return mysqli_fetch_assoc($resulf);
  }     
  mysqli_close($conn);
}

// -------------------------------------------------------------------------------
// ------------------------------------------ admin  ----------------------
// chi tiết hóa đơn
function bill_detail($id){
  global $conn;
  $sql="SELECT * FROM chitiethoadon WHERE MaHD = $id" ;
  $resulf=mysqli_query($conn,$sql);
  $count=mysqli_num_rows($resulf); 
  if($count==0){
      return false;
    }else{
      return $resulf;
    }     
  mysqli_close($conn);
}

if(isset($_GET['take_bill'])){
  $id = intval($_GET['id']);
  $bill = one_bill($id);
  $detail = bill_detail($id);
  if($bill && $detail){
    $arr = [];
    while($row = mysqli_fetch_assoc($detail)){
      $tensp = get_product($row['MaSP'])['TenSP'];
      $arr[] = [
        'id' => $row['MaHD'],
        'name' => $tensp,
        'price' => $row["DonGia"],
        'quantity' => $row['SoLuong'],
        'color' => $row['MaMau'],
        'size' => $row['Size'],
        'subtotal' => $row['ThanhTien']
      ];
    }
    echo json_encode(['res' => 'success', 'bill' => $bill, 'detail' => $arr]);
  }else{
    echo json_encode(['res' => 'error', 'bill' => '', 'detail' => '']);
  }
}
if(isset($_POST['cancel_bill'])){
  $mahd = $_POST['mahd'];
  $sql = "update hoadon set TinhTrang='Hủy Bỏ' where MaHD=$mahd";
  $rs = mysqli_query($conn, $sql);
  $isFalse = false;
  if ($rs) {
    $sql1 = "SELECT DISTINCT MaMau FROM `chitiethoadon` WHERE MaHD='$mahd'";
    $rs1 = mysqli_query($conn, $sql1);
    while ($r1 = mysqli_fetch_array($rs1)) {
      $m = $r1['MaMau'];
      $sql3 = "select *from chitiethoadon where MaHD='$mahd' and MaMau='$m'";
      $rs3 = mysqli_query($conn, $sql3);
      while ($r2 = mysqli_fetch_array($rs3)) {
        $size = $r2['Size'];
        $sql4 = "select *from chitiethoadon where MaHD='$mahd' and MaMau='$m' and Size='$size'";
        $rs4 = mysqli_query($conn, $sql4);
        while ($r3 = mysqli_fetch_array($rs4)) {
          $sl = $r3['SoLuong'];
          $masp = $r3['MaSP'];
          $sql2 = "UPDATE `chitietsanpham` set `SoLuong`=(`SoLuong` + '$sl') where `MaSP`='$masp' and `MaSize`='$size' and `MaMau`='$m'";
          $rs2 = mysqli_query($conn, $sql2);
          $isFalse = true;
        }
      }
    }
  }
  if($isFalse) echo json_encode(['res' => 'success']);
}
// -------------------------------------------------------------------------------
// cart
// update cart
if(isset($_POST['update_cart_product'])){
  session_start();
  $id=$_POST['id'];
  $quantity=$_POST['quantity'];
  $size= isset($_POST['size']) ? $_POST['size'] : 0;
  $color= isset($_POST['color']) ? $_POST['color'] : 0;
  $quantityWarehouse = check_product_soluong($id,$size,$color);
  $found = true; // check cart
  $alerts= array();
  $subtotal = 0;
  foreach ($_SESSION['cart_product'] as $item_cart) {
      $product = product_detail_name($item_cart['MaSP']);
      $price = intval(str_replace(',', '', $item_cart['DonGia']));
      if(($item_cart['MaSP']===$id) and ($item_cart['Size']===$size) and ($item_cart['Mau']===$color)){
          if(($item_cart['SoLuong']+$quantity) <= $quantityWarehouse){
              $cart[]=array('MaSP'=>$item_cart['MaSP'],'TenSP' => $product, 'SoLuong'=>($quantity),'Size'=>$item_cart['Size'],'Mau'=>$item_cart['Mau'],'DonGia'=>$item_cart['DonGia']);
              $subtotal += $quantity * $price;
              $alerts[] = ['res' => 'success', 'status' => 'update', 'title' => 'Đã cập nhật số lượng sản phẩm'];
          }else{
              $cart[]=array('MaSP'=>$item_cart['MaSP'],'TenSP' => $product, 'SoLuong'=>($item_cart['SoLuong']),'Size'=>$item_cart['Size'],'Mau'=>$item_cart['Mau'],'DonGia'=>$item_cart['DonGia']);
              $alerts[] = ['res' => 'error', 'title' => 'Bạn đã có '.$item_cart['SoLuong'].' trong khi kho chỉ còn '.$quantityWarehouse.' sản phẩm'];
          }                     
      }else{
          $cart[]=array('MaSP'=>$item_cart['MaSP'],'TenSP' => $product, 'SoLuong'=>($item_cart['SoLuong']),'Size'=>$item_cart['Size'],'Mau'=>$item_cart['Mau'],'DonGia'=>$item_cart['DonGia']);
          $subtotal += $item_cart['SoLuong'] * $price;
      }
  }
  // var_dump($subtotal); die;
  $errorAlert = '';
  foreach($alerts as $alert){
    if($alert['res'] == 'error'){
      $errorAlert.= $alert['title'];
      $found = false;
    }
  }
  if($found==false){
      echo json_encode(['res' => "error", 'title' => 'Cập nhật số lượng giỏ hàng', 'content' => $errorAlert]);
  }else{
      $sucessAlert = '';
      foreach($alerts as $alert){
          if($alert['res'] == 'success'){
              $_SESSION["cart_product"] = $cart;
              $sucessAlert = 'Cập nhật giỏ hàng thành công';
          }
      }
      // var_dump($cart);die;
      echo json_encode(['res' => "success", 'title' => 'Cập nhật số lượng giỏ hàng', 'content' => $sucessAlert, 'subtotal' => $subtotal]);
  }
}

// -------------------------------------------------------------------------------
// ------------------------------------------ email  -----------------------------
function convert_vn2latin($str)
{
    // Mảng các ký tự tiếng việt không dấu theo mã unicode tổ hợp
    $tv_unicode_tohop  =
        [
            "à","á","ạ","ả","ã","â","ầ","ấ","ậ","ẩ","ẫ","ă", "ằ","ắ","ặ","ẳ","ẵ",
            "è","é","ẹ","ẻ","ẽ","ê","ề" ,"ế","ệ","ể","ễ",
            "ì","í","ị","ỉ","ĩ",
            "ò","ó","ọ","ỏ","õ","ô","ồ","ố","ộ","ổ","ỗ","ơ" ,"ò","ớ","ợ","ở","õ",
            "ù","ú","ụ","ủ","ũ","ư","ừ","ứ","ự","ử","ữ",
            "ỳ","ý","ỵ","ỷ","ỹ",
            "đ",
            "À","À","Ạ","Ả","Ã","Â","Ầ","Ấ","Ậ","Ẩ","Ẫ","Ă" ,"Ằ","Ắ","Ặ","Ẳ","Ẵ",
            "È","É","Ẹ","Ẻ","Ẽ","Ê","Ề","Ế","Ệ","Ể","Ễ",
            "Ì","Í","Ị","Ỉ","Ĩ",
            "Ò","Ó","Ọ","Ỏ","Õ","Ô","Ồ","Ố","Ộ","Ổ","Ỗ","Ơ" ,"Ờ","Ớ","Ợ","Ở","Ỡ",
            "Ù","Ú","Ụ","Ủ","Ũ","Ư","Ừ","Ứ","Ự","Ử","Ữ",
            "Ỳ","Ý","Ỵ","Ỷ","Ỹ",
            "Đ"
        ];
    // Mảng các ký tự tiếng việt không dấu theo mã unicode dựng sẵn   
    $tv_unicode_dungsan  =
        [
            "à","á","ạ","ả","ã","â","ầ","ấ","ậ","ẩ","ẫ","ă","ằ","ắ","ặ","ẳ","ẵ",
            "è","é","ẹ","ẻ","ẽ","ê","ề","ế","ệ","ể","ễ",
            "ì","í","ị","ỉ","ĩ",
            "ò","ó","ọ","ỏ","õ","ô","ồ","ố","ộ","ổ","ỗ","ơ","ờ","ớ","ợ","ở","ỡ",
            "ù","ú","ụ","ủ","ũ","ư","ừ","ứ","ự","ử","ữ",
            "ỳ","ý","ỵ","ỷ","ỹ",
            "đ",
            "À","Á","Ạ","Ả","Ã","Â","Ầ","Ấ","Ậ","Ẩ","Ẫ","Ă","Ằ","Ắ","Ặ","Ẳ","Ẵ",
            "È","É","Ẹ","Ẻ","Ẽ","Ê","Ề","Ế","Ệ","Ể","Ễ",
            "Ì","Í","Ị","Ỉ","Ĩ",
            "Ò","Ó","Ọ","Ỏ","Õ","Ô","Ồ","Ố","Ộ","Ổ","Ỗ","Ơ","Ờ","Ớ","Ợ","Ở","Ỡ",
            "Ù","Ú","Ụ","Ủ","Ũ","Ư","Ừ","Ứ","Ự","Ử","Ữ",
            "Ỳ","Ý","Ỵ","Ỷ","Ỹ",
            "Đ"
        ];
    // Mảng các ký không dấu sẽ thay thế cho ký tự có dấu
    $tv_khongdau =
        [
            "a","a","a","a","a","a","a","a","a","a","a" ,"a","a","a","a","a","a",
            "e","e","e","e","e","e","e","e","e","e","e",
            "i","i","i","i","i",
            "o","o","o","o","o","o","o","o","o","o","o","o" ,"o","o","o","o","o",
            "u","u","u","u","u","u","u","u","u","u","u",
            "y","y","y","y","y",
            "d",
            "A","A","A","A","A","A","A","A","A","A","A","A" ,"A","A","A","A","A",
            "E","E","E","E","E","E","E","E","E","E","E",
            "I","I","I","I","I",
            "O","O","O","O","O","O","O","O","O","O","O","O" ,"O","O","O","O","O",
            "U","U","U","U","U","U","U","U","U","U","U",
            "Y","Y","Y","Y","Y",
            "D"
        ];

    $str = str_replace($tv_unicode_dungsan, $tv_khongdau, $str);
    $str = str_replace($tv_unicode_tohop,   $tv_khongdau, $str);
    return $str;
}
?>



