<!-- Modal xem chi tiết -->
<div class="modal fade" id="detailStudent" tabindex="-1" role="dialog" aria-labelledby="detailStudentLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="detailStudentLabel">Thông tin chi tiết học viên</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Nội dung chi tiết của học viên -->
        <p><b>Tên:</b></p>
        <p><b>Địa chỉ:</b></p>
        <p><b>Số điện thoại:</b></p>
        <p><b>Email:</b></p>
        
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
              <td><a href="#" data-toggle="modal" data-target="#paymentStudent">Khóa học Tiếng Anh cơ bản</a></td>
              <td>3 tháng</td>
            </tr>
            <tr>
              <th scope="row">2</th>
              <td><a href="#" data-toggle="modal" data-target="#paymentStudent">Khóa học Tiếng Anh nâng cao</a></td>
              <td>6 tháng</td>
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
