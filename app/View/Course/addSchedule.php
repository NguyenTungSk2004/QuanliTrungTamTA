<div class="modal fade" id="addSchedule">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Thêm lịch trình</h5>
        <button type="button" class="close"  onclick="$('#addSchedule').modal('hide');">&times;</button>
      </div>
      <div class="modal-body">
        <form action="/QuanLiTrungTamTA/course/addSchedule" method="POST">

          <div class="form-group">
            <label for="course_id">Mã khóa học</label>
            <input type="text" class="form-control" name="course_id" value="<?php echo $course['course_id']?>" readonly>
          </div>

          <div class="form-group">
            <label for="teacher_id">Tên giáo viên</label>
            <select class="form-control" name="teacher_id">
              <?php foreach($teachers as $teacher):?>
                <option value="<?php echo $teacher['teacher_id']?>"><?php echo $teacher['name']?></option>
              <?php endforeach;?>
            </select>
          </div>

          <div class="form-group">
            <label for="">Ngày trong tuần</label>
              <div class="row">
                <div class="col">
                    <input type="checkbox" name="day_of_week[]" value="monday">
                    <label for="monday">Thứ 2</label>
                </div>
                <div class="col">
                    <input type="checkbox" name="day_of_week[]" value="tuesday">
                    <label for="tuesday">Thứ 3</label>
                </div>
                <div class="col">
                    <input type="checkbox" name="day_of_week[]" value="wednesday">
                    <label for="wednesday">Thứ 4</label>
                </div>
                <div class="col">
                    <input type="checkbox" name="day_of_week[]" value="thursday">
                    <label for="thursday">Thứ 5</label>
                </div>
              </div>
              <div class="row">
                <div class="col">
                    <input type="checkbox" name="day_of_week[]" value="friday">
                    <label for="friday">Thứ 6</label>
                </div>
                <div class="col">
                    <input type="checkbox" name="day_of_week[]" value="saturday">
                    <label for="saturday">Thứ 7</label>
                </div>
                <div class="col">
                    <input type="checkbox" name="day_of_week[]" value="sunday">
                    <label for="sunday">Chủ nhật</label>
                </div>
                <div class="col"></div>
              </div>
          </div>

          <div class="form-group">
            <label for="start_time">Thời gian bắt đầu</label>
            <input type="time" class="form-control" name="start_time" placeholder="Thời gian bắt đầu">
          </div>

          <div class="form-group">
            <label for="end_time">Thời gian kết thúc</label>
            <input type="time" class="form-control" name="end_time" placeholder="Thời gian kết thúc">
          </div>
          
          <button type="submit" class="btn btn-primary">Save</button>
        </form>
      </div>
    </div>
  </div>
</div>
