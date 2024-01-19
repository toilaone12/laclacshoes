<?php
if (isset($_GET['id']) == false) {
    header('Location:?view');
}
$id = $_GET['id'];
if (product($id) == false) {
    header('Location:?view');
}
$product = mysqli_fetch_array(product($id));
$price_sale = price_sale($product['MaSP'], $product['DonGia']);
$product_detail_size = product_detail_size($id);
// var_dump($product_detail_size); die;
$product_detail_color = product_detail_color($id);
$product_review = product_review($id);
if (product_detail_image($id) == false) {
    $product_detail_image = array('Anh1' => 'spinner.gif', 'Anh2' => 'spinner.gif', 'Anh3' => 'spinner.gif', 'Anh4' => 'spinner.gif');
} else {
    $product_detail_image = mysqli_fetch_array(product_detail_image($id));

}
?>
<div class="breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col">
                <p class="bread"><span><a href="?view">Trang chủ</a></span> / <span>Chi tiết sản phẩm<menu
                            type="context"></menu></span></p>
            </div>
        </div>
    </div>
</div>
<div class="colorlib-product">
    <div class="container">
        <div class="row row-pb-lg product-detail-wrap">
            <div class="col-sm-7" style="height: 510px;">
                <div class="owl-carousel h-100">
                    <div class="item">
                        <div class="product-entry border">
                            <a href="#" class="prod-img">
                                <img src="webroot/image/sanpham/<?php echo $product['AnhNen'] ?>"
                                    class="img-fluid image-detail-product" alt=" ">
                            </a>
                        </div>
                    </div>
                    <div class="item">
                        <div class="product-entry border">
                            <a href="#" class="prod-img" style="height: 490px;">
                                <img src="webroot/image/sanpham/<?php echo $product_detail_image['Anh1'] ?>"
                                    class="img-fluid <?=$product_detail_image['Anh1'] == "spinner.gif" ? 'image-loading' : 'image-detail-product'?>"
                                    alt=" ">
                            </a>
                        </div>
                    </div>
                    <div class="item">
                        <div class="product-entry border">
                            <a href="#" class="prod-img" style="height: 490px;">
                                <img src="webroot/image/sanpham/<?php echo $product_detail_image['Anh2'] ?>"
                                    class="img-fluid <?=$product_detail_image['Anh1'] == "spinner.gif" ? 'image-loading' : 'image-detail-product'?>"
                                    alt=" ">
                            </a>
                        </div>
                    </div>
                    <div class="item">
                        <div class="product-entry border">
                            <a href="#" class="prod-img" style="height: 490px;">
                                <img src="webroot/image/sanpham/<?php echo $product_detail_image['Anh3'] ?>"
                                    class="img-fluid <?=$product_detail_image['Anh1'] == "spinner.gif" ? 'image-loading' : 'image-detail-product'?>"
                                    alt=" ">
                            </a>
                        </div>
                    </div>
                    <div class="item">
                        <div class="product-entry border">
                            <a href="#" class="prod-img" style="height: 490px;">
                                <img src="webroot/image/sanpham/<?php echo $product_detail_image['Anh4'] ?>"
                                    class="img-fluid <?=$product_detail_image['Anh1'] == "spinner.gif" ? 'image-loading' : 'image-detail-product'?>"
                                    alt=" ">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <form class="col-sm-5" action="?view=addtocart" method="post" id="form1">
                <div class="product-desc">
                    <h3><?php echo $product['TenSP']; ?></h3>
                    <p class="price">
                        <span><?php echo number_format($price_sale, 0) . '₫'; ?></span>
                        <?php if (number_format($product['DonGia']) !== number_format($price_sale)) { ?>
                        <span class="price-old"><?php echo  number_format($product['DonGia'], 0) . ' ' . ' ₫'; ?></span>
                        <?php } ?>
                        <span class="rate">
                            <?php
                            $sqlAverageStar = "SELECT * FROM `binhluan` WHERE MaSP = ".$product['MaSP'];
                            $rsAverageStar = mysqli_query($conn,$sqlAverageStar);
                            $total = 0;
                            $count = $rsAverageStar->num_rows;
                            $starAverage = 0;
                            if($count){
                                while($rowAverageStar = mysqli_fetch_assoc($rsAverageStar)){
                                    $total += intval($rowAverageStar['SoSao']);
                                }
                                $starAverage = ceil($total / $count);
                            }
                            ?>
                            <?php for($i = 1; $i <= $starAverage; $i++){?>
                            <i class="fas fa-star text-warning"></i>
                            <?php } ?>
                            <?php for($i = $starAverage + 1; $i <= 5; $i++){?>
                            <i class="fas fa-star text-secondary"></i>
                            <?php } ?>
                            (<?= $count ? $count : 0;?> bình luận)
                        </span>
                    </p>
                </div>
                <div class="size-wrap">
                    <div class="block-26 mb-2">
                        <h4>Kích cỡ</h4>
                        <?php $count = 0; while ($row = (mysqli_fetch_array($product_detail_size))) { $count++;?>
                        <div class="box-size mt-2">
                            <input type="radio" class="custom-control-input" id="<?php echo $row['MaSize']; ?>"
                                name="size" value="<?php echo $row['MaSize']; ?>" <?=$count==1 ? '' : ''?>>
                            <label class="custom-control-label cursor-pointer <?= $count != 1 ? 'ml-4' : '' ?>"
                                for="<?php echo $row['MaSize']; ?>">
                                <span class="fs-14"><?php echo $row['MaSize']; ?></span>
                            </label>
                        </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="size-wrap">
                    <div class="block-26 mb-5">
                        <h4>Màu sắc</h4>
                        <?php $count1 = 0; while ($row = (mysqli_fetch_array($product_detail_color))) { $count1++;?>
                        <div class="box-mau mt-2">
                            <input type="radio" class="custom-control-input" id="<?php echo $row['MaMau']; ?>"
                                name="mau" value="<?php echo $row['MaMau']; ?>" <?=$count1==1 ? '' : ''?>>
                            <label class="custom-control-label <?= $count1 != 1 ? 'ml-4' : '' ?>"
                                for="<?php echo $row['MaMau']; ?>">
                                <span class="fs-15"><?php echo $row['MaMau']; ?></span>
                            </label>
                        </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="input-group mb-5 ml-4 w-50">
                    <span class="input-group-btn">
                        <button type="button" class="quantity-left-minus btn" id="tru"><i
                                class="fas fa-minus"></i></button>
                    </span>
                    <input type="text" id="soluong" name="soluong" id="soluong" class="form-control input-number "
                        value="1" min="1" max="10">
                    <span class="input-group-btn ml-1">
                        <button type="button" class="quantity-right-plus btn" id="cong"> <i
                                class="fas fa-plus"></i></button>
                    </span>
                </div>
                <input type="hidden" name="idproduct" form="form1" value='<?php echo $product['MaSP'] ?>'>
                <input type="hidden" name="dongia" form="form1" value='<?php echo number_format($price_sale) ?>'>
                <div class="col-sm-12 text-center ml-2">
                    <p class="addtocart"><button type="submit" form="form1" name='addtocart'
                            class="btn col-sm-12 btn-primary "> Thêm vào giỏ hàng</button></p>
                </div>
            </form>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="row">
                    <div class="col-md-12 pills">
                        <div class="bd-example bd-example-tabs">
                            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="pills-description-tab" data-toggle="pill"
                                        href="#pills-description" role="tab" aria-controls="pills-description"
                                        aria-expanded="true">Mô tả</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-review-tab" data-toggle="pill" href="#pills-review"
                                        role="tab" aria-controls="pills-review" aria-expanded="true">Đánh giá</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane border fade" id="pills-description" role="tabpanel"
                                    aria-labelledby="pills-description-tab">
                                    <p><?php echo $product['MoTa'] ?></p>
                                </div>
                                <div class="tab-pane border fade show active" id="pills-review" role="tabpanel"
                                    aria-labelledby="pills-review-tab">
                                    <form action="?view=addtoreview" method="post" id='form2'>
                                        <div class="form-group">
                                            <label for="">Đánh giá sản phẩm</label>
                                            <p class="star">
                                                <i class="fas fa-star text-secondary choose-star fs-15 mr-2"
                                                    data-value="1"></i>
                                                <i class="fas fa-star text-secondary choose-star fs-15 mr-2"
                                                    data-value="2"></i>
                                                <i class="fas fa-star text-secondary choose-star fs-15 mr-2"
                                                    data-value="3"></i>
                                                <i class="fas fa-star text-secondary choose-star fs-15 mr-2"
                                                    data-value="4"></i>
                                                <i class="fas fa-star text-secondary choose-star fs-15 mr-2"
                                                    data-value="5"></i>
                                            </p>
                                            <input type="hidden" name="sosao" value="" id="rating">
                                            <textarea name="noidung" rows="2" cols="30" id="noidung"
                                                class="form-control" placeholder="Viết đánh giá  ..."></textarea>
                                            <input type="hidden" name="masp" form="form2"
                                                value='<?php echo $product['MaSP'] ?>'>
                                            <button form='form2' name="action" value="binhluan" type="submit"
                                                class="mt-3 btn btn-primary alert-danger">Đánh giá</button>
                                        </div>
                                    </form>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h3 class="head">
                                                <?php if ($product_review == false) {
                                                    echo "Chưa có đánh giá nào~~~";
                                                } else {
                                                    echo mysqli_num_rows($product_review) . ' Đánh giá';
                                                ?>
                                            </h3>
                                            <?php
                                                    while ($row = mysqli_fetch_array($product_review)) {
                                                        $rowkh = selectKH($row['MaKH'])
                                            ?>
                                            <div class="review">
                                                <div class="user-img"
                                                    style="background-image: url('webroot/image/logo/user.png');"></div>
                                                <div class="desc">
                                                    <h4>
                                                        <span class="text-left"><?php echo $rowkh['TenKH'] ?></span>
                                                        <span
                                                            class="text-right text-dark"><?php echo date('d/m/Y H:i',strtotime($row['ThoiGian'])) ?></span>
                                                    </h4>
                                                    <p class="star">
                                                        <?php for($i = 1; $i <= $row['SoSao']; $i++){?>
                                                        <i class="fas fa-star text-warning"></i>
                                                        <?php } ?>
                                                        <?php for($i = $row['SoSao'] + 1; $i <= 5; $i++){?>
                                                        <i class="fas fa-star text-secondary"></i>
                                                        <?php } ?>
                                                    </p>
                                                    <p><?php echo $row['NoiDung'] ?></p>
                                                </div>
                                            </div>
                                            <?php
                                                    }
                                                }
                                        ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php 
    if(isset($_GET['alert'])){ ?>
<div id="alertDiv" class="alert alert-danger alert-dismissible fade custom-alert " role="alert">
    <strong> <?php if($_GET['alert']!==''){ echo ' '.$_GET['alert'];} ?></strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<?php  }