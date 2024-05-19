<!-- Modal thêm giáo viên -->
<div class="modal fade" id="addTeacher" tabindex="-1" role="dialog" aria-labelledby="addTeacherLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addTeacherLabel">Đăng ký giáo viên</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Form thêm giáo viên  -->
        <form action="./teacher/addTeacher" method="POST">

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
          <button type="submit" class="btn btn-success">+ Thêm giáo viên</button>
        </form>
      </div>
    </div>
  </div>
</div>