<!-- detailCourse hiển thị lịch trình khóa học -->
<div class="modal fade" 
      id="detailCourse" 
      tabindex="-1" 
      role="dialog" 
      aria-labelledby="detailCourseLabel" 
      aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="detailCourseLabel">Thông tin khóa học</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <!-- Nội dung khóa học-->
        <div class="row">
          <div class="col-md-6">
            <p><b>Mã khóa học: </b> TA-N01</p>
            <p><b>Tiêu đề: </b> Tiếng anh cơ bản</p>
            <p><b>Thời lượng: </b> 3 tháng</p>
            <p><b>Ngày bắt đầu: </b> 12/5/2024</p>
            <p><b>Ngày kết thúc: </b> 12/8/2024</p>
            <p><b>Mô tả: </b> Khóa học giúp bạn cải thiện trình độ tiếng anh của mình một cách nhanh chóng bắt đầu từ con số 0</p>
          </div>
          <div class="col-md-6 text-center">
            <img src="https://luanvan24.com/wp-content/uploads/2021/02/hinh-anh-de-tai-nghien-cuu-khoa-hoc-mon-tieng-anh-2.jpg" alt="Hình ảnh khóa học" style="max-width: 100%; height: auto; margin-bottom: 3rem;">
          </div>
        </div>
        <h5>Lịch trình khóa học hiện có</h5>        
        <!-- Bảng hiển thị các thời gian biểu trong tuần-->
        <div class="table-responsive">
          <table class="table table-inverse table-striped">
            <thead>
              <tr>
                <th>STT</th>
                <th>Mã</th>
                <th>Giáo viên</th>
                <th>Thời gian</th>
                <th>Bắt đầu</th>
                <th>Kết thúc</th>
                <th>Thao tác</th>
              </tr>
            </thead>
            <tbody>
              <tr class="table-row-hover" data-toggle="modal" data-target="#detailSchedule">
                <td scope="row">1</td>
                <td>LTR001</td>
                <td>Nguyễn Tùng Sk</td>
                <td>Thứ 2, Thứ 3, Thứ 4</td>
                <td>8:00</td>
                <td>10:00</td>
                <td><button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i> Xóa</button></td>
              </tr>
              <tr class="table-row-hover" data-toggle="modal" data-target="#detailSchedule">
                <td scope="row">2</td>
                <td>LTR002</td>
                <td>Đỗ Trung kiên</td>
                <td>3, 5, 7</td>
                <td>17:00</td>
                <td>19:00</td>
                <td><button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i> Xóa</button></td>
              </tr>
              <tr class="table-row-hover" data-toggle="modal" data-target="#detailSchedule">
                <td scope="row">3</td>
                <td>LTR003</td>
                <td>Nguyễn Khánh Dương</td>
                <td>2, 3, 4</td>
                <td>20:00</td>
                <td>22:00</td>
                <td><button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i> Xóa</button></td>
              </tr>
            </tbody>
          </table>
        </div>

      <div class="modal-footer">
          <button type="button" class="btn btn-info" data-toggle="modal" data-target="#addSchedule">Thêm lịch trình</butto>
          <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editCourse">Chỉnh sửa</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
      </div>
    </div>
  </div>
</div>

<!-- include component -->
<?php include './app/View/Course/detailSchedule.php'?>
<?php include './app/View/Course/addSchedule.php'?>
<?php include './app/View/Course/editCourse.php'?>