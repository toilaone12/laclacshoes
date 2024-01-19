<?php
$view = $_GET['view'];
switch ($view) {
    case 'products-category':
        $products=product_category($_GET['id']);
        break;
    case 'products-search':
        $products=product_search($_POST['key']);
        break;    
    
    default:
        # code...
        break;
}
?>
<div class="breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col">
                <p class="bread"><span><a href="?view">Trang Chủ</a></span> / <span>Sản phẩm</span></p>
            </div>
        </div>
    </div>
</div>
<div class="colorlib-product">
    <div class="container">
        <?php if(isset($_POST['key'])){ ?>
        <span class="fs-25">Từ khóa tìm kiếm: <?= $_POST['key'];?></span>
        <?php } ?>
        <div class="row row-pb-md">
            <?php
            if($products){
            while ($row=(mysqli_fetch_array($products))) { $price_sale=price_sale($row['MaSP'],$row['DonGia']);?>
            <div class="col-lg-3 mb-4 ">
                <div class="product-entry border" style="height: 390px;">
                    <div class="product-lable mb-3">
                        <?php $price_sale=price_sale($row['MaSP'],$row['DonGia']); if($price_sale < $row['DonGia']) { 
                        echo '<span>Giảm '.number_format( $row['DonGia'] - $price_sale).'đ </span>';}?>
                    </div>
                    <a href="?view=product-detail&id=<?php echo $row['MaSP'] ?>" class="prod-img">
                        <img src="webroot/image/sanpham/<?php echo $row['AnhNen']; ?>" class="img-fluid image-product"
                            alt="Free html5 bootstrap 4 template">
                    </a>
                    <div class="desc">
                        <h2><a href="#"><?php echo $row['TenSP']; ?></a></h2>
                        <span class="price"><?php echo number_format($price_sale,0).'₫'; ?></span>
                        <?php if(number_format($row['DonGia']) !== number_format($price_sale)){ ?>
                        <span class="price-old"><?php echo  number_format($row['DonGia'], 0 ).' '.' ₫' ; ?></span>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <?php } }else{?>
            <div class="d-flex justify-content-center align-items-center mt-3" style="height: 300px;">
                <i class="fa-regular fa-circle-xmark text-danger mr-3" style="font-size: 50px;"></i>
                <span class="text-danger fs-25">Hiện không có sản phẩm với từ khóa trên</span>
            </div>
            <?php }?>
        </div>
    </div>
</div>