


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Quản lí khóa học</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  
  <link rel="stylesheet" href="..\public\css\cssProject.css">
  <!-- include style and animation -->
  <script src="./public/js/Course.js"></script>
</head>
<body>

<?php include './app/View/Template/navbar.php' ?>
<?php include './app/View/Template/sidebar.php' ?>

<!-- Main Content Section -->
<div class="main-content ">
  <div class="container mt-5">
      <h2>Thông tin khóa học</h2>
      <p>Đây là trang quản lí khóa học. Bạn có thể thêm, sửa, xóa thông tin về khóa học ở đây.</p>

      <!-- Nội dung khóa học-->
      <div class="row">
        <div class="col-md-6">
        <p><b>Mã khóa học: </b> TA-N01</p>
        <p><b>Tiêu đề: </b> Tiếng anh cơ bản</p>
        <p><b>Thời lượng: </b> 3 tháng</p>
        <p><b>Ngày bắt đầu: </b> 12/5/2024</p>
        <p><b>Ngày kết thúc: </b> 12/8/2024</p>
        <p><b>Mô tả: </b> Khóa học giúp bạn cải thiện trình độ tiếng anh của mình một cách nhanh chóng bắt đầu từ con số 0</p>
        <button type="button" class="btn btn-warning mb-4" data-toggle="modal" data-target="#editCourse">
          <i class="fas fa-edit"></i>
           Chỉnh sửa
        </button> 
        </div>
        <div class="col-md-6">
            <img src="https://luanvan24.com/wp-content/uploads/2021/02/hinh-anh-de-tai-nghien-cuu-khoa-hoc-mon-tieng-anh-2.jpg" alt="Hình ảnh khóa học" style="max-width: 100%; height: 15em; margin-bottom: 3rem;">
        </div>
      </div>
      
      <h3>Lịch trình khóa học hiện có</h3>     
  
      <!-- Bảng hiển thị các thời gian biểu trong tuần-->
      <div class="table-responsive">
        <table class="table table-striped">
          <thead class="thead-dark">
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
          <td><a class="btn btn-sm btn-danger" onclick="event.stopPropagation();"><i class="fas fa-trash"></i> Xóa</a></td>
        </tr>
        <tr class="table-row-hover" data-toggle="modal" data-target="#detailSchedule">
          <td scope="row">2</td>
          <td>LTR002</td>
          <td>Đỗ Trung kiên</td>
          <td>3, 5, 7</td>
          <td>17:00</td>
          <td>19:00</td>
          <td><a class="btn btn-sm btn-danger" onclick="event.stopPropagation();"><i class="fas fa-trash"></i> Xóa</a></td>
        </tr>
        <tr class="table-row-hover" data-toggle="modal" data-target="#detailSchedule">
          <td scope="row">3</td>
          <td>LTR003</td>
          <td>Nguyễn Khánh Dương</td>
          <td>2, 3, 4</td>
          <td>20:00</td>
          <td>22:00</td>
          <td><a class="btn btn-sm btn-danger" onclick="event.stopPropagation();"><i class="fas fa-trash"></i> Xóa</a></td>
        </tr>
          </tbody>
        </table>
      </div>
      <!--end table course class row -->
      
      <!-- Nút thêm lịch trình -->
        <button type="button" class="btn btn-success mb-4" data-toggle="modal" data-target="#addSchedule">
           + Thêm lịch trình
        </button> 


    </div>
  </div>
</div>

<!-- include component -->
<?php include './app/View/Course/detailSchedule.php'?>
<?php include './app/View/Course/addSchedule.php'?>
<?php include './app/View/Course/editCourse.php'?>

<!-- Bootstrap JS and jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
