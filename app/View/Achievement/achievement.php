<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Quản lí kết quả học tập</title>
  <!-- font-awesome icon -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <!-- bootstrap css -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  
  <!-- Bootstrap JS and jQuery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href=".\public\css\sidebar.css">
  <link rel="stylesheet" href=".\public\css\cssProject.css">
</head>
<body>

<?php include './app/View/Template/navbar.php' ?>
<?php include 'app/View/Template/sidebar.php' ?>

<!-- Main Content Section -->
<div class="main-content">
    <div class="container mt-5">
    <h2>Kết quả học tập</h2>
    <table class="table mt-3">
      <thead class="thead-dark">
        <tr>
          <th>STT</th>
          <th>Mã lớp học</th>
          <th>Khóa học</th>
          <th>Tỉ lệ đạt</th>
        </tr>
      </thead>
      <tbody>
        <?php 
          foreach($schedules as $key => $schedule):
          $location[$key] = './achievement/detail?id=' . $schedule['schedule_id'] . '&nameCourse=' . $schedule['title'];
        ?>
        <tr 
          class="table-row-hover" 
          onclick="window.location.href='<?php echo $location[$key]?>'">
          <td><?php echo $key+1?></td>
          <td><?php echo $schedule['schedule_id']?></td>
          <td><?php echo $schedule['title']?></td>
          <td><?php echo $key*10 .'%'?></td>
        </tr>
        <?php endforeach;?>
      </tbody>
    </table>
    </div>
</div>


<!-- Bootstrap JS and jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
