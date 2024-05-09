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
        <form action="#" method="POST">
          <div class="form-group">
            <label for="name">Tên:</label>
            <input type="text" class="form-control" id="name">
          </div>
          <div class="form-group">
            <label for="address">Địa chỉ:</label>
            <input type="text" class="form-control" id="address">
          </div>
          <div class="form-group">
            <label for="phone">Số điện thoại:</label>
            <input type="text" class="form-control" id="phone">
          </div>
          <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email">
          </div>

          <div class="form-group">
            <label>Khóa học:</label>

            <div class="form-check">
                <input type="checkbox" name="english" id="pro_Edit" class="form-check-input" value="pro">
                <label for="pro_Edit" class="form-check-label">Tiếng anh pro</label>
            </div>

            <div class="form-check">
                <input type="checkbox" name="english" id="basic_Edit" class="form-check-input" value="basic">
                <label for="basic_Edit" class="form-check-label">Tiếng anh basic</label>
            </div>

            <div class="form-check">
                <input type="checkbox" name="english" id="speaking_Edit" class="form-check-input" value="speaking">
                <label for="speaking_Edit" class="form-check-label">Tiếng anh speaking</label>
            </div>

            <div class="form-check">
                <input type="checkbox" name="english" id="listening_Edit" class="form-check-input" value="listening">
                <label for="listening_Edit" class="form-check-label">Tiếng anh listening</label>
            </div>
        </div>

          <!-- Thêm các trường thông tin khác cần chỉnh sửa -->
          <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
        </form>
      </div>
    </div>
  </div>
</div>