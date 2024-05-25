<!-- Modal thêm học viên -->
<div class="modal fade" id="addStudent" tabindex="-1" role="dialog" aria-labelledby="addStudentLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addStudentLabel">Đăng ký học viên</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Form thêm học viên  -->
        <form action="./student/addStudent" method="POST">
          <div class="form-group">
            <label for="name">Tên:</label>
            <input type="text" class="form-control" name="name" required>
          </div>
          <div class="form-group">
            <label for="address">Địa chỉ:</label>
            <input type="text" class="form-control" name="address" required>
          </div>
          <div class="form-group">
            <label for="phone">Số điện thoại:</label>
            <input type="text" class="form-control" name="phone" required>
          </div>
          <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" name="email" required>
          </div>
          <div class="form-group">
            <label for="idCourse">Khóa học:</label>
            <select name="idCourse[]" id="idCourse" class="form-control" multiple required>
              <?php foreach($schedules as $schedule):?>
                <option value="<?php echo $schedule['schedule_id']?>"><?php echo $schedule['title']. ' - '.$schedule['schedule_id']?></option>
              <?php endforeach;?>
            </select>
          </div>
          <!-- Thêm các trường thông tin khác cần chỉnh sửa -->
          <button type="submit" class="btn btn-primary">Thêm học viên</button>
        </form>
      </div>
    </div>
  </div>
</div>