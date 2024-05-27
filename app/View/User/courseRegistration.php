<!-- Modal thêm học viên -->
<div class="modal fade" id="courseRegistration" tabindex="-1" role="dialog" aria-labelledby="courseRegistrationLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="courseRegistrationLabel">Đăng ký khóa học</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Form thêm học viên  -->
        <form action="./courseRegistration" method="POST" id="formCourseRegistration">
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
        </form>
        <div class="modal-footer">
            <button 
                  type="submit" 
                  class="btn btn-success"
                  onclick="addRequiredAttribute();"
            >Đăng ký</button>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  function addRequiredAttribute() {
    var submit = true;
    var inputFiled = false;
    var selected = false;

    var form = document.getElementById('formCourseRegistration');
    var inputs = form.getElementsByTagName('input');
    for (var i = 0; i < inputs.length; i++) {
      if(inputs[i].value == ''){
        submit = false;
        inputFiled = true;
      }
    }
    var selectedCourse = document.getElementById('idCourse');

    if(selectedCourse.selectedIndex === -1){
      submit = false;
      selected = true;
    }
    if(submit){
      form.submit();
    }else{
      submit=false;
      if(inputFiled) alert('Vui lòng điền đầy đủ thông tin !');
      if(selected) alert('Vui lòng chọn khóa học bạn muốn đăng ký !');
    }
  }
</script>