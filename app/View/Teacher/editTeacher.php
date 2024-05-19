<!-- Modal chỉnh sửa -->
<div class="modal fade" id="editTeacher" tabindex="-1" role="dialog" aria-labelledby="editTeacherLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editTeacherLabel">Chỉnh sửa thông tin giáo viên</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Form chỉnh sửa thông tin giáo viên -->
        <form action="./teacher/editTeacher" method="POST">
          <input type="hidden" name="teacher_id">
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
          <button type="submit" class="btn btn-primary"> Lưu thay đổi</button>
        </form>
      </div>
    </div>
  </div>
</div>