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
        <form action="#" method="POST">

          <div class="form-group">
            <label for="teacherName">Tên:</label>
            <input type="text" class="form-control" id="teacherName">
          </div>

          <div class="form-group">
            <label for="teacherAddress">Địa chỉ:</label>
            <input type="text" class="form-control" id="teacherAddress">
          </div>

          <div class="form-group">
            <label for="phoneTeacher">Số điện thoại:</label>
            <input type="text" class="form-control" id="phoneTeacher">
          </div>

          <div class="form-group">
            <label for="emailTeacher">Email:</label>
            <input type="email" class="form-control" id="emailTeacher">
          </div>

          <div class="form-group">
            <label>Khóa học:</label>

            <div class="form-check">
                <input type="checkbox" name="english" id="pro_Add" class="form-check-input" value="pro">
                <label for="pro_Add" class="form-check-label">Tiếng anh pro</label>
            </div>

            <div class="form-check">
                <input type="checkbox" name="english" id="basic_Add" class="form-check-input" value="basic">
                <label for="basic_Add" class="form-check-label">Tiếng anh basic</label>
            </div>

            <div class="form-check">
                <input type="checkbox" name="english" id="speaking_Add" class="form-check-input" value="speaking">
                <label for="speaking_Add" class="form-check-label">Tiếng anh speaking</label>
            </div>

            <div class="form-check">
                <input type="checkbox" name="english" id="listening_Add" class="form-check-input" value="listening">
                <label for="listening_Add" class="form-check-label">Tiếng anh listening</label>
            </div>
        </div>
          <!-- Thêm các trường thông tin khác cần chỉnh sửa -->
          <button type="submit" class="btn btn-primary">Thêm giáo viên</button>
        </form>
      </div>
    </div>
  </div>
</div>