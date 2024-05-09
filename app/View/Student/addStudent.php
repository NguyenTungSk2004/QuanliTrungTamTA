<!-- Modal thêm học viên -->
<div class="modal fade" id="addStudent" tabindex="-1" role="dialog" aria-labelledby="addStudentLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addStudentLabel">Đăng ký học viên</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Form thêm học viên  -->
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
            <label for="idCourse">Khóa học:</label>
            <select name="idCourse" id="idCourse" class="form-control">
                <option value="pro">Tiếng anh pro</option>
                <option value="basic">Tiếng anh basic</option>
                <option value="speaking">Tiếng anh speaking</option>
                <option value="listening">Tiếng anh listening</option>
            </select>
          </div>
          <!-- Thêm các trường thông tin khác cần chỉnh sửa -->
          <button type="submit" class="btn btn-primary">Thêm học viên</button>
        </form>
      </div>
    </div>
  </div>
</div>