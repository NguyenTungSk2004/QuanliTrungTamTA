<div class="modal fade" id="addSchedule">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Thêm lịch trình</h5>
        <button type="button" class="close"  onclick="$('#addSchedule').modal('hide');">&times;</button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="schedule_id">Mã lịch trình</label>
            <input type="text" class="form-control" id="schedule_id" placeholder="Mã lịch trình">
          </div>

          <div class="form-group">
            <label for="teacher_id">Tên giáo viên</label>
            <select class="form-control" id="teacher_id">
              <option value="Giáo viên 1">Giáo viên 1</option>
              <option value="Giáo viên 2">Giáo viên 2</option>
              <option value="Giáo viên 3">Giáo viên 3</option>
              <!-- Add more options for other teachers -->
            </select>
          </div>

          <div class="form-group">
            <label for="">Ngày trong tuần</label>
              <div class="row">
                <div class="col">
                    <input type="checkbox" name="day_of_week" value="monday">
                    <label for="monday">Thứ 2</label>
                </div>
                <div class="col">
                    <input type="checkbox" name="day_of_week" value="tuesday">
                    <label for="tuesday">Thứ 3</label>
                </div>
                <div class="col">
                    <input type="checkbox" name="day_of_week" value="wednesday">
                    <label for="wednesday">Thứ 4</label>
                </div>
                <div class="col">
                    <input type="checkbox" name="day_of_week" value="thursday">
                    <label for="thursday">Thứ 5</label>
                </div>
              </div>
              <div class="row">
                <div class="col">
                    <input type="checkbox" name="day_of_week" value="friday">
                    <label for="friday">Thứ 6</label>
                </div>
                <div class="col">
                    <input type="checkbox" name="day_of_week" value="saturday">
                    <label for="saturday">Thứ 7</label>
                </div>
                <div class="col">
                    <input type="checkbox" name="day_of_week" value="sunday">
                    <label for="sunday">Chủ nhật</label>
                </div>
                <div class="col"></div>
              </div>
          </div>

          <div class="form-group">
            <label for="start_time">Thời gian bắt đầu</label>
            <input type="time" class="form-control" id="start_time" placeholder="Thời gian bắt đầu">
          </div>

          <div class="form-group">
            <label for="end_time">Thời gian kết thúc</label>
            <input type="time" class="form-control" id="end_time" placeholder="Thời gian kết thúc">
          </div>
          
          <button type="submit" class="btn btn-primary">Save</button>
        </form>
      </div>
    </div>
  </div>
</div>
