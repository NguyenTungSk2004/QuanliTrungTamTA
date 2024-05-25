<!-- Modal xem chi tiết-->
<div class="modal fade" id="detailTeacher" tabindex="-1" role="dialog" aria-labelledby="detailTeacherLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="detailTeacherLabel">Thông tin chi tiết giáo viên</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Nội dung chi tiết của giáo viên -->
        <p>Tên: Nguyễn Văn A</p>
        <p>Địa chỉ: 123 Đường ABC, Quận XYZ, TP HCM</p>
        <p>Số điện thoại: 0123456789</p>
        <p>Email: nguyenvana@example.com</p>
        
        <!-- Bảng hiển thị các khóa học đã đăng ký của giáo viên -->
        <h5>Các khóa học đang phụ trách</h5>
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
                      <!--Thêm các danh sách các khóa học tại đây  -->
          </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
      </div>
    </div>
  </div>
</div>