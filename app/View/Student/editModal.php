<!-- Modal chỉnh sửa -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Chỉnh sửa thông tin học viên</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Form chỉnh sửa thông tin học viên -->
        <form>
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
          <!-- Thêm các trường thông tin khác cần chỉnh sửa -->
          <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
        </form>
      </div>
    </div>
  </div>
</div>