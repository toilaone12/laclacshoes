</div>
<!-- End of Main Content -->

<!-- Footer -->
<footer class="sticky-footer bg-white">
  <div class="container my-auto">
    <div class="copyright text-center my-auto">
      <span>Copyright &copy; Your Website 2023</span>
    </div>
  </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
  <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        <a class="btn btn-primary" href="login.html">Logout</a>
      </div>
    </div>
  </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="template/vendor/jquery/jquery.min.js"></script>
<script src="template/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="template/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="template/js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="template/vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="template/js/demo/chart-area-demo.js"></script>
<script src="template/js/demo/chart-pie-demo.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery.print/1.6.2/jQuery.print.min.js" integrity="sha512-t3XNbzH2GEXeT9juLjifw/5ejswnjWWMMDxsdCg4+MmvrM+MwqGhxlWeFJ53xN/SBHPDnW0gXYvBx/afZZfGMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
  $(document).ready(function() {
    $(document).on('click', '.print-bill', function(e){
      // e.preventDefault();
      $('#form-invoice').print();
    })
    $(document).on('click', '.modal-description', function(e){
      let content = $(this).attr('title');
      $('.content-description').text(content);
    })
    $(document).on('change', '.multi-image', function(e){
      var fileCount = this.files.length;
      if (fileCount > 4) {
        alert('Bạn chỉ được chọn tối đa 4 tệp tin ảnh');
        $(this).val(''); // Xóa các tệp đã chọn nếu vượt quá số lượng cho phép
      }else{
        var fileNames = '';
        for (var i = 0; i < this.files.length; i++) {
          fileNames += this.files[i].name + ', ';
        }
        // Loại bỏ dấu phẩy cuối cùng
        fileNames = fileNames.slice(0, -2); // Cắt bỏ 2 ký tự cuối cùng (dấu phẩy và khoảng trắng)
        $('.file-multi-image').html('[' + fileNames + ']');
      }
    })
    $(document).on('change', '.one-image', function(e){
      $('.file-image').html('[' + this.files[0].name + ']');
    })
    $(document).on('click','#btn1',function(e){
      e.preventDefault();
      console.log(1);
      $('.apply-type').removeAttr('disabled')
    })
    $(document).on('click','#btn2',function(e){
      e.preventDefault();
      console.log(12);
      $('.apply-type').attr('disabled','disabled')
    })
    $(document).on('click','.choose-sp', function(e){
      // e.preventDefault();
      let length = $('.choose-sp:checked').length;
      if(length == 0){
        $('.apply-type').attr('disabled','disabled')
      }else{
        $('.apply-type').removeAttr('disabled')

      }
    })
    $('.open-modal-gift').on('click',function(e){
      e.preventDefault();
      let id = $(this).attr('data-id');
      $('#mapgg').val(id);
    })
  });
</script>

</body>

</html>