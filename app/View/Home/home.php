<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Trang chủ</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<?php include './app/View/Template/navbar.php' ?>
<?php include 'app/View/Template/sidebar.php' ?>

<!-- Main Content Section -->
<div class="main-content">
    <div class="container mt-5">
    <h2>Trang chủ</h2>
    <div class="table-reponesive">
      <table class="table">
        <thead>
          <tr>
            <th>Tên học viên</th>
            <th>Khóa học đăng ký</th>
            <th>Thời gian đăng ký</th>
            <th>Trạng thái</th>
            <th>Thao tác</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($listWebRegistration as $registration):?>

            <form action="/QuanLiTrungTamTA/student/addStudent" method="POST" id="pheduyetForm">
              <input type="hidden" name="name" value="<?php echo $registration['name']?>">
              <input type="hidden" name="address" value="<?php echo $registration['address']?>">
              <input type="hidden" name="email" value="<?php echo $registration['email']?>">
              <input type="hidden" name="phone" value="<?php echo $registration['phone']?>">
              <input type="hidden" name="idCourse[]" value="<?php echo $registration['schedule_id']?>">
              <input type="hidden" name="time" value="<?php echo $registration['time']?>">
            </form>
          <tr>
            <td scope="row">
              <?php echo $registration['name']?>
            </td>
            <td>
              <?php echo $registration['schedule_id']?>
            </td>
            <td>
              <?php echo $registration['time']?>
            </td>
            <td>
              <div class="badge bg-warning" style="height: 1.5rem;">
                  <span style="font-size:1.2em;">chưa phê duyệt</span>
              </div>
            </td>
            <td>
              <button class="btn btn-primary btn-sm" onclick="document.getElementById('pheduyetForm').submit();">Phê duyệt</button>
            </td>
          </tr>
          <?php endforeach;?>
        </tbody>
      </table>
    </div>
    </div>
</div>
<!-- Bootstrap JS and jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
