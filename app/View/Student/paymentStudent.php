<!-- Modal thông tin phiếu thu -->
<div class="modal fade" id="paymentStudent" tabindex="-1" role="dialog" aria-labelledby="paymentStudentLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="paymentStudentLabel">Thông tin phiếu thu</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Form thông tin phiếu thu -->
        <form action="#" method="POST">
          <div class="form-group">
            <label for="studentName">Tên học viên:</label>
            <input type="text" class="form-control" id="studentName" readonly>
          </div>
          <div class="form-group">
            <label for="courseName">Tên khóa học:</label>
            <input type="text" class="form-control" id="courseName" readonly>
          </div>
          <div class="form-group">
            <label for="registrationInfo">Thông tin đăng ký:</label>
            <textarea class="form-control" id="registrationInfo" rows="3" readonly></textarea>
          </div>
          <div class="form-group">
            <label for="amountPaid">Số tiền đã thu:</label>
            <input type="number" class="form-control" id="amountPaid" readonly>
          </div>
          <div class="form-group">
            <label for="discount">Giảm giá:</label>
            <input type="number" class="form-control" id="discount" readonly>
          </div>
          <div class="form-group">
            <label for="remainingAmount">Tiền học còn thiếu:</label>
            <input type="number" class="form-control" id="remainingAmount" readonly>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">xóa</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
      </div>
    </div>
  </div>
</div>
