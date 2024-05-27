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
        <!-- Thống kê nhanh -->
        <section class="statistics mb-3">
            <h2>Tổng quan hệ thống</h2>
            <div class="row">
                <div class="col-md-3">
                    <div class="card text-white bg-primary mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Học viên mới</h5>
                            <p class="card-text">
                              <?php echo $countStudent?>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card text-white bg-success mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Khóa học hiện tại</h5>
                            <p class="card-text">
                              <?php echo $countCourse?>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card text-white bg-warning mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Đơn đăng ký chờ phê duyệt</h5>
                            <p class="card-text">
                              <?php echo $countWebRegistration?>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card text-white bg-danger mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Thông báo quan trọng</h5>
                            <p class="card-text">2</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Thông báo quản trị -->
        <section class="admin-announcements mb-5">
            <h3>Thông báo quản trị</h3>
            <div class="alert alert-info" role="alert">
                <i class="fas fa-info-circle"></i> Hệ thống sẽ bảo trì vào ngày 1 tháng 6, 2024.
            </div>
            <div class="alert alert-warning" role="alert">
                <i class="fas fa-exclamation-triangle"></i> Vui lòng kiểm tra lại thông tin học viên trước khi phê duyệt.
            </div>
            <div class="alert alert-danger" role="alert">
                <i class="fas fa-exclamation-circle"></i> Liên hệ bộ phận kỹ thuật nếu gặp bất kỳ vấn đề gì.
            </div>
        </section>

        <!-- Bảng Thông tin đăng ký -->
        <h2>Phê duyệt đăng ký học viên</h2>
        <div class="table-responsive">
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
                    <?php foreach($listWebRegistration as $registration): ?>
                        <form action="/QuanLiTrungTamTA/student/addStudent" method="POST" id="formPheDuyet<?php echo $registration['schedule_id']?>">
                            <input type="hidden" name="name" value="<?php echo $registration['name']?>">
                            <input type="hidden" name="address" value="<?php echo $registration['address']?>">
                            <input type="hidden" name="email" value="<?php echo $registration['email']?>">
                            <input type="hidden" name="phone" value="<?php echo $registration['phone']?>">
                            <input type="hidden" name="idCourse[]" value="<?php echo $registration['schedule_id']?>">
                            <input type="hidden" name="time" value="<?php echo $registration['time']?>">
                        </form>
                        <tr>
                            <td scope="row"><?php echo $registration['name']?></td>
                            <td><?php echo $registration['schedule_id']?></td>
                            <td><?php echo $registration['time']?></td>
                            <td>
                                <div class="badge bg-warning" style="height: 1.5rem;">
                                    <span style="font-size:1.2em;">chưa phê duyệt</span>
                                </div>
                            </td>
                            <td>
                               <button class="btn btn-primary btn-sm" onclick="buttonPheduyetClicked('<?php echo $registration['schedule_id']?>');">Phê duyệt</button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>



<!-- Bootstrap JS and jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


<script>
function buttonPheduyetClicked(id) {
    const form = document.getElementById('formPheDuyet' + id);
    form.submit();
}

</script>
</body>
</html>
