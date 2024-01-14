<div class="card mb-5">
   <div class="card-header">
      <div class="fs-30 text-center d-block">Thêm phiếu giảm giá</div>
   </div>
   <div class="card-body">
      <form method="POST" action="phieugiamgia/xuly.php">
         <div class="row">
            <div class="col-lg-5 col-md-5">
               <div class="form-group mb-3">
                  <label class="mb-2 fs-16" for="tenphieu">Tên phiếu giảm giá <span class="text-danger cursor-pointer" title="Bắt buộc">(*)</span></label>
                  <input type="text" class="form-control" name="tenphieu" required>
               </div>
            </div>
            <div class="col-lg-4 col-md-4">
               <div class="form-group mb-3">
                  <label class="mb-2 fs-16" for="maphieu">Mã phiếu giảm giá <span class="text-danger cursor-pointer" title="Bắt buộc">(*)</span></label>
                  <input type="text" class="form-control" name="maphieu" required>
               </div>
            </div>
            <div class="col-lg-3 col-md-3">
               <div class="form-group mb-3">
                  <label class="mb-2 fs-16" for="soluong">Số lượng <span class="text-danger cursor-pointer" title="Bắt buộc">(*)</span></label>
                  <input type="number" class="form-control" name="soluong" required>
               </div>
            </div>
            <div class="col-lg-3 col-md-3">
               <div class="form-group mb-3">
                  <label class="mb-2 fs-16" for="sotien">Tiền được giảm <span class="text-danger cursor-pointer" title="Bắt buộc">(*)</span></label>
                  <input type="number" class="form-control" name="sotien" required>
               </div>
            </div>
            <div class="col-lg-4 col-md-4">
               <div class="form-group mb-3">
                  <label class="mb-2 fs-16" for="thoihan">Thời hạn phiếu <span class="text-danger cursor-pointer" title="Bắt buộc">(*)</span></label>
                  <input type="date" class="form-control" min="<?= date('Y-m-d')?>" name="thoihan" required>
               </div>
            </div>
         </div>

         <button type="submit" name="them" class="m-0 btn btn-outline-primary">Xác nhận</button>
      </form>
   </div>
</div>