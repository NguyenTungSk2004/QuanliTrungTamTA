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
    <h2>Khóa học <?php echo $_GET['nameCourse']?> - <?php echo $id?></h2>
    <table class="table mt-3">
      <thead class="thead-dark">
        <tr>
          <th>STT</th>
          <th>Mã học viên</th>
          <th>Tên học viên</th>
          <th>Điểm</th>
          <th>Thao tác</th>
        </tr>
      </thead>
      <tbody>
        <?php 
            foreach($students as $key => $value):
                $score = $this->db->table('grades')->get(['registration_id' => $value['registration_id']]);
                if($score) {
                    $score = $score[0]['score'];
                }else{
                    $score = 0;
                }
            
        ?>
        <tr class="table-row-hover">
          <td><?php echo $key+1?></td>
          <td><?php echo $value['student_id']?></td>
          <td><?php echo $value['name']?></td>
          <td><?php echo $score?></td>
          <td>
            <!-- Button trigger modal -->
            <button 
                    type="button" 
                    class="btn btn-warning btn-sm" 
                    data-toggle="modal" 
                    data-target="#suadiem" 
                    data-diem="<?php echo $score;?>">
                Sửa điểm
            </button>
          </td>
        </tr>
        <?php endforeach;?>
      </tbody>

    </table>
    </div>
</div>



<!-- Modal -->
<div class="modal fade" id="suadiem" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Sửa điểm</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                <form action="/QuanLiTrungTamTA/achievement/updateGrades">
                    <input type="hidden" name="id" value="">
                    <input type="text" class="form-control" name="score" value="0">
                    <button type="button" class="btn btn-primary form-control mt-3">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS and jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    $(document).ready(function() {
    $('#editStudent').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget); // Nút kích hoạt modal
      var score = button.data('score');

      var modal = $(this);
      modal.find('.modal-body input[name="score"]').val(score);
    });
  });
</script>

</body>
</html>
