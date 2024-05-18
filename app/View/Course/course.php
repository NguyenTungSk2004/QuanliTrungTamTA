<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Quản lí khóa học</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  
  <link rel="stylesheet" href=".\public\css\sidebar.css">
  <link rel="stylesheet" href=".\public\css\cssProject.css">
  <!-- include style and animation -->
  <script src="./public/js/Course.js"></script>
</head>
<body>

<?php include './app/View/Template/navbar.php' ?>
<?php include 'app/View/Template/sidebar.php' ?>

<!-- Main Content Section -->
<div class="main-content ">
    <div class="container mt-5">
    <h2>Quản lí khóa học</h2>
      <p>Đây là trang quản lí khóa học. Bạn có thể thêm, sửa, xóa thông tin về khóa học ở đây.</p>
      <!-- Nút thêm học viên -->
        <button type="button" class="btn btn-success mb-4" data-toggle="modal" data-target="#addCourse">
          + Thêm khóa học
        </button>
      
      <!-- table course class row -->
      <div class="row">
        <div class="col-lg-4 mb-4">
            <div class="card">
                <img src="https://luanvan24.com/wp-content/uploads/2021/02/hinh-anh-de-tai-nghien-cuu-khoa-hoc-mon-tieng-anh-2.jpg" class="card-img-top" alt="Tiếng anh cơ bản">
                <div class="card-body">
                    <h5 class="card-title">Tiếng anh cơ bản</h5>
                    <p class="card-text">Khóa học giúp bạn cải thiện trình độ tiếng anh của mình một cách nhanh chóng bắt đầu từ con số 0</p>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#detailCourse">Xem chi tiết</button>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#">Xóa</button>
                </div>
            </div>
        </div>
      </div>
      <!--end table course class row -->
</div>


<!-- include component -->
<?php include './app/View/Course/addCourse.php'?>
<?php include './app/View/Course/detailCourse.php'?>



<!-- Bootstrap JS and jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
