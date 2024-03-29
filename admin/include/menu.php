<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Trang chủ</title>
  <!-- Custom fonts for this template-->

  <!-- <link href="/onishoes/webroot/font/Font Awesome/css/all.min.css" rel="stylesheet" type="text/css"> -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="template/mdi/css/materialdesignicons.min.css" rel="stylesheet">
  <link href="template/cssfont.css" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet">

  <link href="template/css/sb-admin-2.min.css" rel="stylesheet">
  <link href="template/css/style.css" rel="stylesheet">
  <link href="template/bootstrap/mdb.lite.min.css" rel="stylesheet">
  <script src="/onishoes/webroot/jquery/jquery.js"></script>
  
  <?php
  if (isset($_SESSION['admin'])) {
    $nv = $_SESSION['admin'];
  } ?>

</head>

<body id="page-top">
  <!-- Page Wrapper -->
  <div id="wrapper">
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
      <br>
      <!-- Sidebar - Brand -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="index.php">
          <i class="mdi mdi-home menu-icon"></i>
          <span>LẠC LẠC SHOES</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Interface
      </div>
      <!-- Nav Item - Charts -->
      <?php
      $sql = "SELECT * FROM `hoadon` WHERE `TinhTrang` = 'chưa duyệt'";
      $rs = mysqli_query($conn, $sql);
      $dem = mysqli_num_rows($rs);
      ?>
      <li class="nav-item">
        <a class="nav-link" href="?action=xldathang">
          <!-- <i class="mdi mdi-format-list-bulleted menu-icon"></i> -->
          <i class="fa-solid fa-file-invoice"></i>
          <span>Đơn Đặt Hàng <sup style="border-radius: 50%; right: 10px; top: -0.7em;" class="badge-danger text-center px-2 py-1"><?php echo $dem ?></sup></span></a>
      </li>
      <!-- Nav Item - Charts -->
      <?php
      $sql = "SELECT * FROM `hoadon` WHERE NgayGiao is not null and TinhTrang='Đã duyệt' ORDER BY NgayGiao ASc";
      $rs = mysqli_query($conn, $sql);
      $dem = mysqli_num_rows($rs);
      ?>
      <li class="nav-item">
        <a class="nav-link" href="?action=giaohang">
          <!-- <i class="mdi mdi-car"></i> -->
          <i class="fa-solid fa-truck-fast"></i>
          <span>Giao Hàng <sup style="border-radius: 50%; right: 10px; top: -0.7em;" class="badge-danger text-center px-2 py-1"><?php echo $dem ?></sup></span></a>
      </li>
      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <!-- <i class="mdi mdi-dns"></i> -->
          <i class="fa-solid fa-warehouse"></i>
          <span>Kho Hàng</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <!-- <h6 class="collapse-header">Custom Components:</h6> -->
            <!-- <a class="collapse-item" href="?action=kho&view=xemdh">Xem đơn hàng</a> -->
            <a class="collapse-item" href="?action=kho&view=nhapkho">Xuất / Nhập kho</a>
            <a class="collapse-item" href="?action=kho&view=nhatky">Nhật ký Nhập Kho</a>
            <a class="collapse-item" href="?action=kho&view=nhatkyx">Nhật ký Xuất Kho</a>
          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Manage
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
          <!-- <i class="fas fa-fw fa-folder"></i> -->
          <i class="fa-solid fa-list"></i>
          <span>Danh Mục</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="?action=danhmuc">Danh sách</a>
            <a class="collapse-item" href="?action=danhmuc&view=them">Thêm</a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collaspeSupplier" aria-expanded="true" aria-controls="collaspeSupplier">
          <!-- <i class="fas fa-fw fa-folder"></i> -->
          <i class="fa-solid fa-parachute-box"></i>
          <span>Nhà cung cấp</span>
        </a>
        <div id="collaspeSupplier" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="?action=nhacc">Danh sách</a>
            <a class="collapse-item" href="?action=nhacc&view=them">Thêm</a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages1" aria-expanded="true" aria-controls="collapsePages1">
          <!-- <i class="fas fa-fw fa-table"></i> -->
          <i class="fa-solid fa-shoe-prints"></i>
          <span>Sản Phẩm</span>
        </a>
        <div id="collapsePages1" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="?action=sanpham">Danh Sách</a>
            <a class="collapse-item" href="?action=sanpham&view=themsp">Thêm</a>
            <a class="collapse-item" href="?action=mau&view=them">Thêm màu</a>
          </div>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="?action=khuyenmai">
          <!-- <i class="fas fa-atom"></i> -->
          <i class="fa-solid fa-percent"></i>
          <span>Khuyến Mãi</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="?action=phieugiamgia">
          <!-- <i class="fas fa-atom"></i> -->
          <i class="fa-solid fa-ticket"></i>
          <span>Phiếu giảm giá</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="?action=danhthu">
          <!-- <i class="fas fa-atom"></i> -->
          <i class="fa-solid fa-chart-simple"></i>
          <span>Doanh Thu</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="?action=nhanvien">
          <!-- <i class="fas fa-atom"></i> -->
          <i class="fa-solid fa-person"></i>
          <span>Quản lý nhân viên</span></a>
      </li>
      <hr class="sidebar-divider d-none d-md-block">

    </ul>