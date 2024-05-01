<!-- Modal xem chi tiết-->
<div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="detailModalLabel">Thông tin chi tiết học viên</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Nội dung chi tiết của học viên -->
        <p>Tên: Nguyễn Văn A</p>
        <p>Địa chỉ: 123 Đường ABC, Quận XYZ, TP HCM</p>
        <p>Số điện thoại: 0123456789</p>
        <p>Email: nguyenvana@example.com</p>
        
        <!-- Bảng hiển thị các khóa học đã đăng ký của học viên -->
        <h5>Các khóa học đã đăng ký</h5>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">STT</th>
              <th scope="col">Tên khóa học</th>
              <th scope="col">Thời lượng</th>
              <!-- Thêm các cột khác tùy ý -->
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">1</th>
              <td><a href="#" data-toggle="modal" data-target="#paymentModal">Khóa học Tiếng Anh cơ bản</a></td>
              <td>3 tháng</td>
              <!-- Thêm các cột khác tùy ý -->
            </tr>
            
          </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
      </div>
    </div>
  </div>
</div>