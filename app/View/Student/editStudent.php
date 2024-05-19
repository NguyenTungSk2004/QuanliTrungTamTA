<!-- Modal chỉnh sửa -->
<div class="modal fade" id="editStudent" tabindex="-1" role="dialog" aria-labelledby="editStudentLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editStudentLabel">Chỉnh sửa thông tin học viên</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Form chỉnh sửa thông tin học viên -->
        <form action="./student/editStudent" method="POST">
          <input type="hidden" name="student_id">
          <div class="form-group">
            <label for="name">Tên:</label>
            <input type="text" class="form-control" name="name">
          </div>
          <div class="form-group">
            <label for="address">Địa chỉ:</label>
            <input type="text" class="form-control" name="address">
          </div>
          <div class="form-group">
            <label for="phone">Số điện thoại:</label>
            <input type="text" class="form-control" name="phone">
          </div>
          <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" name="email">
          </div>
          <!-- Thêm các trường thông tin khác cần chỉnh sửa -->
          <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
        </form>
      </div>
    </div>
  </div>
</div>
