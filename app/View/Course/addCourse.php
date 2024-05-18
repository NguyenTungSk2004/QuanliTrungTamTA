<!-- Modal thêm khóa học -->
<div class="modal fade" id="addCourse" tabindex="-1" role="dialog" aria-labelledby="addCourseLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addCourseLabel">Thêm khóa học</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Form thêm khóa học  -->
        <form action="#" method="POST">

        <div class="form-group">
            <label for="course_id">Mã khóa học</label>
            <input type="text" class="form-control" name="course_id" placeholder="Mã khóa học">
          </div>

            <div class="form-group">
              <label for="nameCourse">Khóa học:</label>
              <input type="text" class="form-control" name="nameCourse" placeholder="Tên khóa học">
            </div>

            <div class="form-group">
              <label for="titleCourse">Tiêu đề:</label>
              <input type="text" class="form-control" name="titleCourse" placeholder="Tiêu đề khóa học">
            </div>

            <div class="form-group">
              <label for="description">Mô tả:</label>
              <input type="text" class="form-control" name="description" placeholder="Mô tả khóa học">
            </div>


        <div class="form-group">
          <label for="duration">Thời lượng:</label>
          <div class="input-group">
            <input type="number" class="form-control" name="duration">
            <div class="input-group-append">
              <span class="input-group-text">Tháng</span>
            </div>
          </div>
        </div>

        <div class="form-group">
          <label for="start_date">Ngày bắt đầu:</label>
          <input type="date" class="form-control" name="start_date">
        </div>

        <div class="form-group">
          <label for="end_date">Ngày kết thúc:</label>
          <input type="date" class="form-control" name="end_date">
        </div>

        <div class="form-group">
            <label>Hình ảnh:</label><br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="imageSource" value="url">
                <label class="form-check-label" for="urlSource">URL</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="imageSource"  value="upload">
                <label class="form-check-label" for="uploadSource">Tải lên từ máy</label>
            </div>
        </div>

        <div class="form-group" name="imageUrlField" style="display: none;">
            <label for="imageURL">URL ảnh:</label>
            <input type="url" class="form-control" name="imageURL">
        </div>
        <div class="form-group" name="uploadField" style="display: none;">
            <label for="imageUpload">Tải lên ảnh:</label>
            <input type="file" class="form-control-file" accept="image/*" name="imageUpload">
        </div>

        <!-- Thêm các trường thông tin khác cần chỉnh sửa -->
        <button type="submit" class="btn btn-primary">Thêm khóa học</button>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
    try {
      var SelectionImageFieldAddCourse = document.querySelectorAll('#addCourse input[type="radio"][name="imageSource"]');
      SelectionImageFieldAddCourse.forEach(function(radio) {
        radio.addEventListener("change", function() {
          handleImageSourceChange("addCourse",this.value);
        });
      });
    } catch (error) {
      console.error(error);
    }
</script>
