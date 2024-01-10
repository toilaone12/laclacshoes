<div class="container-fluid">
    <div class=" alert alert-primary">
        <h4 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white mr-2">
            </span> ADMIN - LẠC LẠC SHOES &#160;<i class="fas fa-chevron-right" style="font-size: 18px"></i>&#160; Khuyến mãi
        </h4>
    </div>
    <div class="card card-body">
        <div class="card mb-5">
            <div class="card-header">
                <div class="fs-30 text-center d-block">Thêm khuyến mãi</div>
            </div>
            <div class="card-body">
                <form method="GET" action="khuyenmai/xuly.php" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-lg-6 col-md-4">
                            <div class="form-group">
                                <label class="m-auto" for="th">Tên khuyến mãi</label>
                                <input type="text" class="form-control" name="tkm" required>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3">
                            <div class="form-group">
                                <label class="m-auto" for="th">Ngày bắt đầu</label>
                                <input type="date" class="form-control" name="nbd" required>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3">
                            <div class="form-group">
                                <label class="m-auto" for="th">Ngày kết thúc</label>
                                <input type="date" class="form-control" name="nkt" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3 col-md-3">
                            <div class="form-group">
                                <label class="m-auto" for="th">Tiền giảm giá</label>
                                <input type="text" class="form-control" name="t">
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3">
                            <div class="form-group">
                                <label class="m-auto" for="th">Phần trăm giảm giá</label>
                                <input type="text" class="form-control" name="pt">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group">
                                <label class="m-auto" for="th">Mô tả</label><textarea class="form-control" name="mt" required></textarea>
                            </div>
                        </div>
                    </div>
                    <button type="submit" name="them" class="m-0 btn btn-outline-primary">Xác nhận</button>

                </form>
            </div>
        </div>