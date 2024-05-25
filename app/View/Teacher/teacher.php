<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Quản lí giáo viên</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href=".\public\css\cssProject.css">
</head>
<body>

<?php include './app/View/Template/navbar.php' ?>
<?php include './app/View/Template/sidebar.php' ?>


<!-- Main Content Section -->
<div class="main-content">
    <div class="container mt-5">
      <h2>Quản lí giáo viên</h2>
      <p>Đây là trang quản lí giáo viên. Bạn có thể thêm, sửa, xóa thông tin về giáo viên ở đây.</p>
      <!-- Nút thêm giáo viên -->
        <button type="button" class="btn btn-success mb-4" data-toggle="modal" data-target="#addTeacher">
           + Thêm giáo viên
        </button>
      <!-- Bảng dữ liệu quản lí giáo viên -->
      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">Mã</th>
            <th scope="col">Tên</th>
            <th scope="col">Địa chỉ</th>
            <th scope="col">Số điện thoại</th>
            <th scope="col">Email</th>
            <th scope="col">Thao tác</th>
          </tr>
        </thead>
        <tbody>
            <?php if (!empty($listteacher)): ?>
              <?php 
                  foreach($listteacher as $teacher): 
                    $listCourse = $this->getListCourse($teacher);
                    $listCourse = json_encode($listCourse);
                    $this->db->logToConsole($listCourse);
              ?>
                <tr class="table-row-hover">
                  <th scope="row"
                      data-toggle="modal"   
                      data-target="#detailTeacher"
                      data-name="<?php echo $teacher['name']?>"
                      data-address="<?php echo $teacher['address']?>"
                      data-phone="<?php echo $teacher['phone']?>"
                      data-email="<?php echo $teacher['email']?>"       
                      data-listcourse='<?php echo htmlspecialchars($listCourse, ENT_QUOTES, 'UTF-8'); ?>'
                  >
                    <?php echo $teacher['teacher_id']?>
                  </th>
                  <td 
                      data-toggle="modal"     
                      data-target="#detailTeacher"
                      data-name="<?php echo $teacher['name']?>"
                      data-address="<?php echo $teacher['address']?>"
                      data-phone="<?php echo $teacher['phone']?>"
                      data-email="<?php echo $teacher['email']?>"  
                      data-listcourse='<?php echo htmlspecialchars($listCourse, ENT_QUOTES, 'UTF-8'); ?>'
                  >
                    <?php echo $teacher['name']?>
                  </td>
                  <td
                      data-toggle="modal"   
                      data-target="#detailTeacher"
                      data-name="<?php echo $teacher['name']?>"
                      data-address="<?php echo $teacher['address']?>"
                      data-phone="<?php echo $teacher['phone']?>"
                      data-email="<?php echo $teacher['email']?>"  
                      data-listcourse='<?php echo htmlspecialchars($listCourse, ENT_QUOTES, 'UTF-8'); ?>'
                  >
                    <?php echo $teacher['address']?>
                  </td>
                  <td
                      data-toggle="modal"   
                      data-target="#detailTeacher"
                      data-name="<?php echo $teacher['name']?>"
                      data-address="<?php echo $teacher['address']?>"
                      data-phone="<?php echo $teacher['phone']?>"
                      data-email="<?php echo $teacher['email']?>"  
                      data-listcourse='<?php echo htmlspecialchars($listCourse, ENT_QUOTES, 'UTF-8'); ?>'
                  >
                    <?php echo $teacher['phone']?>
                  </td>
                  <td
                      data-toggle="modal"   
                      data-target="#detailTeacher"
                      data-name="<?php echo $teacher['name']?>"
                      data-address="<?php echo $teacher['address']?>"
                      data-phone="<?php echo $teacher['phone']?>"
                      data-email="<?php echo $teacher['email']?>"  
                      data-listcourse='<?php echo htmlspecialchars($listCourse, ENT_QUOTES, 'UTF-8'); ?>'
                  >
                    <?php echo $teacher['email']?>
                  </td>
                  <td>
                    <div class="d-inline">
                        <a type="button" 
                            class="btn btn-warning btn-sm mr-2" 
                            data-toggle="modal"
                            data-target="#editTeacher"
                            data-name="<?php echo $teacher['name']?>"
                            data-address="<?php echo $teacher['address']?>"
                            data-phone="<?php echo $teacher['phone']?>"
                            data-email="<?php echo $teacher['email']?>"
                            data-teacher_id="<?php echo $teacher['teacher_id']?>"
                        >
                            <i class="fas fa-edit"></i> Chỉnh sửa
                        </a>
                    </div>
                    <div class="d-inline">
                        <form 
                            id="deleteForm<?php echo $teacher['teacher_id']; ?>" 
                            action="./teacher/deleteTeacher" 
                            method="POST"
                            class="d-inline"
                        >
                            <input 
                                type="hidden" 
                                name="teacher_id" 
                                value="<?php echo $teacher['teacher_id']; ?>"
                            >
                            <button 
                                type="button" 
                                onclick="deleteTeacher('<?php echo $teacher['teacher_id']; ?>')" 
                                class="btn btn-danger btn-sm"
                            >
                                <i class="fa fa-trash" aria-hidden="true"></i> Xóa
                            </button>
                        </form>
                    </div>
                  </td>

                </tr>
              <?php endforeach; ?>
            <?php endif; ?>
          </tbody>
      </table>
    </div>
  </div>


<?php include './app/View/Teacher/addTeacher.php'?>
<?php include './app/View/Teacher/editTeacher.php'?>
<?php include './app/View/Teacher/detailTeacher.php'?>


<!-- Bootstrap JS and jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!-- my js -->
<script src="./public/js/Teacher.js"></script>
</body>
</html>
