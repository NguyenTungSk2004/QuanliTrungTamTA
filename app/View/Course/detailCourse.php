<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Quản lí khóa học</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  
  <link rel="stylesheet" href="..\public\css\cssProject.css">

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
        <p><b>Mã khóa học: </b> <?php echo $course['course_id']?></p>
        <p><b>Tiêu đề: </b> <?php echo $course['title']?></p>
        <p><b>Thời lượng: </b> <?php echo $course['duration']?></p>
        <p><b>Ngày bắt đầu: </b> <?php echo $course['start_date']?></p>
        <p><b>Ngày kết thúc: </b> <?php echo $course['end_date']?></p>
        <p><b>Mô tả: </b> <?php echo $course['description']?> </p>
        <button type="button" class="btn btn-warning mb-4" data-toggle="modal" data-target="#editCourse">
          <i class="fas fa-edit"></i>
           Chỉnh sửa
        </button> 
        </div>
        <div class="col-md-6">
            <img src="
            <?php 
                  echo strpos($course['img'], 'http') === 0 
                  ? $course['img'] : '../' . $course['img']?>" 
              alt="Hình ảnh <?php echo $course['title']?>" style="max-width: 100%; height: 15em; margin-bottom: 3rem;">
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
            <?php 
                foreach($schedules as $key => $schedule):
                  $studentInclass= $this->db->table('registrations')->JoinTable(['students' => 'student_id'],['schedule_id' => $schedule['schedule_id']]);
                  $count = count($studentInclass);
                  $studentInclassJson = json_encode($studentInclass); // Chuyển mảng thành chuỗi JSON
              ?>
              <!-- form delete schedule -->
              <form 
                    action="/QuanLiTrungTamTA/course/deleteSchedule" 
                    method="POST" 
                    id="deleteSchedule<?php echo $schedule['schedule_id']?>"
              >
                <input 
                    type="hidden" 
                    name="schedule_id" 
                    value="<?php echo $schedule['schedule_id']?>"
                >
                <input 
                    type="hidden"  
                    name="course_id" 
                    value="<?php echo $schedule['course_id']?>"
                >
              </form>
              <!-- end form delete schedule -->
                <tr 
                    class="table-row-hover" 
                    data-toggle="modal" 
                    data-target="#detailSchedule"
                    data-name="<?php echo $schedule['name'];?>"
                    data-email="<?php echo $schedule['email'];?>"
                    data-day_of_week="<?php echo $schedule['day_of_week'];?>"
                    data-start_time="<?php echo $schedule['start_time'];?>"
                    data-end_time="<?php echo $schedule['end_time'];?>"
                    data-count="<?php echo $count;?>"
                    data-studentInclass='<?php echo htmlspecialchars($studentInclassJson, ENT_QUOTES, 'UTF-8'); ?>'
                >
                  <td scope="row">
                    <?php echo $key+1?>
                  </td>
                  <td>
                    <?php echo $schedule['schedule_id']?>
                  </td>
                  <td>
                    <?php echo $schedule['name'];?>
                  </td>
                  <td>
                    <?php echo $schedule['day_of_week']?>
                  </td>
                  <td>
                    <?php echo $schedule['start_time']?>
                  </td>
                  <td>
                    <?php echo $schedule['end_time']?>
                  </td>
                  <td>

                    <a 
                        type="button" 
                        class="btn btn-sm btn-danger" 
                        onclick="document.getElementById('deleteSchedule<?php echo $schedule['schedule_id']?>').submit();"
                    >
                        <i class="fas fa-trash"></i> Xóa
                    </a>
                  </td>
                </tr>
              <?php endforeach;?>
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

<!-- include style and animation -->
<script src="../public/js/Course.js"></script>
<script src="../public/js/Schedules.js"></script> 
</body>
</html>
