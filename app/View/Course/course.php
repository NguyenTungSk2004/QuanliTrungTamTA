<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Quản lí khóa học</title>
  <!-- font-awesome icon -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <!-- Bootstrap css -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  
  <link rel="stylesheet" href=".\public\css\cssProject.css">
</head>
<body>

<?php include 'app/View/Template/navbar.php' ?>
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
        <?php if(!empty($listCourse)):?>
        <?php foreach($listCourse as $course):?>
        <div class="col-lg-4 mb-4">
            <div class="card">
                <img src="<?php echo $course['img']?>" style="height:15em;" class="card-img-top" alt="<?php echo $course['title']?>">

                <div class="card-body">
                    <h5 class="card-title"><?php echo $course['title']?></h5>
                    <p class="card-text"><?php echo $course['description']?></p>
                    <a href="./course/detail" type="button" class="btn btn-primary">
                      Xem chi tiết
                    </a>
                    <div class="d-inline">
                        <form 
                            id="deleteForm<?php echo $course['course_id']; ?>" 
                            action="./course/deleteCourse" 
                            method="POST"
                            class="d-inline"
                        >
                            <input 
                                type="hidden" 
                                name="course_id" 
                                value="<?php echo $course['course_id']; ?>"
                            >
                            <button 
                                type="button" 
                                onclick="deleteCourse('<?php echo $course['course_id']; ?>')" 
                                class="btn btn-danger"
                            >
                                 Xóa
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach;?>
        <?php endif;?>
      </div>
      <!--end table course class row -->
  </div>
</div>


<!-- include component -->
<?php include './app/View/Course/addCourse.php'?>

<!-- Bootstrap JS and jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- include style and animation -->
<script src="./public/js/Course.js"></script>
</body>
</html>
