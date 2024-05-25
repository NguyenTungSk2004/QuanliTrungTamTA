<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Quản lí học viên</title>
  <!-- font-awesome icon -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <!-- bootstrap css -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  
  <!-- Bootstrap JS and jQuery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  
  <!-- My css -->
  <link rel="stylesheet" href=".\public\css\cssProject.css">
  <link rel="stylesheet" href="..\public\css\cssProject.css">
</head>
<body>

<?php include './app/View/Template/navbar.php' ?>
<?php include './app/View/Template/sidebar.php' ?>


<!-- Main Content Section -->
<div class="main-content">
    <div class="container mt-5">
      <h2>Quản lí học viên</h2>
      <p>Đây là trang quản lí học viên. Bạn có thể thêm, sửa, xóa thông tin về học viên ở đây.</p>
      <!-- Nút thêm học viên -->
        <button type="button" class="btn btn-success mb-4" data-toggle="modal" data-target="#addStudent">
          + Thêm học viên
        </button>
      <!-- Bảng dữ liệu quản lí học viên -->
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
            <?php if (!empty($listStudent)): ?>
              <?php foreach($listStudent as $student): ?>
                <tr class="table-row-hover">
                  <th scope="row"
                      data-toggle="modal"   
                      data-target="#detailStudent"
                      data-name="<?php echo $student['name']?>"
                      data-address="<?php echo $student['address']?>"
                      data-phone="<?php echo $student['phone']?>"
                      data-email="<?php echo $student['email']?>"                  
                  >
                    <?php echo $student['student_id']?>
                  </th>
                  <td 
                      data-toggle="modal"     
                      data-target="#detailStudent"
                      data-name="<?php echo $student['name']?>"
                      data-address="<?php echo $student['address']?>"
                      data-phone="<?php echo $student['phone']?>"
                      data-email="<?php echo $student['email']?>"  
                  >
                    <?php echo $student['name']?>
                  </td>
                  <td
                      data-toggle="modal"   
                      data-target="#detailStudent"
                      data-name="<?php echo $student['name']?>"
                      data-address="<?php echo $student['address']?>"
                      data-phone="<?php echo $student['phone']?>"
                      data-email="<?php echo $student['email']?>"  
                  >
                    <?php echo $student['address']?>
                  </td>
                  <td
                      data-toggle="modal"   
                      data-target="#detailStudent"
                      data-name="<?php echo $student['name']?>"
                      data-address="<?php echo $student['address']?>"
                      data-phone="<?php echo $student['phone']?>"
                      data-email="<?php echo $student['email']?>"  
                  >
                    <?php echo $student['phone']?>
                  </td>
                  <td
                      data-toggle="modal"   
                      data-target="#detailStudent"
                      data-name="<?php echo $student['name']?>"
                      data-address="<?php echo $student['address']?>"
                      data-phone="<?php echo $student['phone']?>"
                      data-email="<?php echo $student['email']?>"  
                  >
                    <?php echo $student['email']?>
                  </td>
                  <td>
                    <div class="d-inline">
                        <a type="button" 
                            class="btn btn-warning btn-sm mr-2" 
                            data-toggle="modal"
                            data-target="#editStudent"
                            data-name="<?php echo $student['name']?>"
                            data-address="<?php echo $student['address']?>"
                            data-phone="<?php echo $student['phone']?>"
                            data-email="<?php echo $student['email']?>"
                            data-student_id="<?php echo $student['student_id']?>"
                        >
                            <i class="fas fa-edit"></i> Chỉnh sửa
                        </a>
                    </div>
                    <div class="d-inline">
                        <form 
                            id="deleteForm<?php echo $student['student_id']; ?>" 
                            action="./student/deleteStudent" 
                            method="POST"
                            class="d-inline"
                        >
                            <input 
                                type="hidden" 
                                name="student_id" 
                                value="<?php echo $student['student_id']; ?>"
                            >
                            <button 
                                type="button" 
                                onclick="deleteStudent('<?php echo $student['student_id']; ?>')" 
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
  

<?php include './app/View/Student/addStudent.php'?>
<?php include './app/View/Student/editStudent.php'?>
<?php include './app/View/Student/detailStudent.php'?>
<?php include './app/View/Student/paymentStudent.php'?>


  <!-- My javascript -->
  <script src=".\public\js\Student.js"></script>
  <script src="..\public\js\Student.js"></script>
</body>
</html>
