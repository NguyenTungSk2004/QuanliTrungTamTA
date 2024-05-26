<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Quản lí doanh số</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href=".\public\css\cssProject.css">
  <link rel="stylesheet" href="..\public\css\cssProject.css">
</head>
<body>

<?php include 'app/View/Template/navbar.php' ?>
<?php include 'app/View/Template/sidebar.php' ?>

<!-- Main Content Section -->
<div class="main-content">
    <div class="container mt-5">
    <h2>Quản lí thu chi</h2>
    
    <div class="tab table-responsive" id = 'tab_receipt'>

    <table class="table table-striped table-inverse ">
      <thead class="thead-inverse">
        <tr>
          <th>Tên học viên</th>
          <th>Tên khóa học</th>
          <th>Ngày thanh toán</th>
          <th>Số tiền</th>
          <th>Hình thức thanh toán</th>
          <th>Ghi chú</th>
          <th>Thao tác</th>
        </tr>
        </thead>
        <tbody>
          <?php
            if (!empty($tbl)):
              foreach($tbl as $receipt):
          ?>
          <tr class="table-row-hover">
            <td scope="row"><?php echo $receipt['name']?></td>
            <td> <?php echo $receipt['title']?></td>
            <td> <?php echo $receipt["received_date"]?></td>
            <td><?php echo $receipt['amount_received']?></td>
            <td><?php echo $receipt['method']?></td>
            <td><?php echo $receipt['note']?></td>
            <td>
              <form action="" method = "POST">
                <button type="button" class="btn btn-danger">Xóa</button>
              </form>
            </td>
          </tr>
        </tbody>
    </table>
    </div>
    <?php endforeach; ?>
  <?php endif?>
    
    </div>
</div>
<!-- Bootstrap JS and jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
