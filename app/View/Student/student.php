<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Quản lí học viên</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href=".\public\css\sidebar.css">
</head>
<body>

<?php include './app/View/Template/navbar.php' ?>
<?php include 'app/View/Template/sidebar.php' ?>


<!-- Main Content Section -->
<div class="main-content">
    <div class="container mt-5">
      <h2>Quản lí học viên</h2>
      <p>Đây là trang quản lí học viên. Bạn có thể thêm, sửa, xóa thông tin về học viên ở đây.</p>
      <!-- Nút thêm học viên -->
        <button type="button" class="btn btn-success mb-4" data-toggle="modal" data-target="#addCourseModal">
          Thêm học viên
        </button>
      <!-- Bảng dữ liệu quản lí học viên -->
      <table class="table">
        <thead>
          <tr>
            <th scope="col">STT</th>
            <th scope="col">Tên</th>
            <th scope="col">Địa chỉ</th>
            <th scope="col">Số điện thoại</th>
            <th scope="col">Email</th>
            <th scope="col">Thao tác</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">1</th>
            <td>Nguyễn Văn A</td>
            <td>123 Đường ABC, Quận XYZ, TP HCM</td>
            <td>0123456789</td>
            <td>nguyenvana@example.com</td>
            <td>
              <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editModal">Sửa</button>
              <button type="button" class="btn btn-danger btn-sm">Xóa</button>
              <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#detailModal">Xem chi tiết</button>
            </td>
          </tr>
          <!-- Thêm các dòng khác tương ứng với thông tin của các học viên khác -->
        </tbody>
      </table>
    </div>
  </div>
  

<?php include 'app/View/Student/addModal.php'?>
<?php include 'app/View/Student/editModal.php'?>
<?php include 'app/View/Student/detailModal.php'?>
<?php include 'app/View/Student/paymentModal.php'?>



<!-- Bootstrap JS and jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
