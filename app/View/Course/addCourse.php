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
          <label for="nameCourse">Khóa học:</label>
          <input type="text" class="form-control" id="nameCourse">
        </div>

        <div class="form-group">
          <label for="titleCourse">Tiêu đề:</label>
          <input type="text" class="form-control" id="titleCourse">
        </div>

        <div class="form-group">
          <label for="description">Mô tả:</label>
          <input type="text" class="form-control" id="description">
        </div>

        <div class="form-group">
          <label for="duration">Thời lượng:</label>
          <div class="input-group">
            <input type="number" class="form-control" id="duration">
            <div class="input-group-append">
              <span class="input-group-text">buổi</span>
            </div>
          </div>
        </div>

        <div class="form-group">
          <label for="start_date">Ngày bắt đầu:</label>
          <input type="date" class="form-control" id="start_date">
        </div>

        <div class="form-group">
          <label for="end_date">Ngày kết thúc:</label>
          <input type="date" class="form-control" id="end_date">
        </div>

        <div class="form-group">
            <label>Hình ảnh:</label><br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="imageSource" id="urlSource" value="url">
                <label class="form-check-label" for="urlSource">URL</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="imageSource" id="uploadSource" value="upload">
                <label class="form-check-label" for="uploadSource">Tải lên từ máy</label>
            </div>
        </div>

        <div class="form-group" id="imageUrlField" style="display: none;">
            <label for="imageURL">URL ảnh:</label>
            <input type="url" class="form-control" id="imageURL">
        </div>
        <div class="form-group" id="uploadField" style="display: none;">
            <label for="imageUpload">Tải lên ảnh:</label>
            <input type="file" class="form-control-file" id="imageUpload" accept="image/*">
        </div>


        <!-- Thêm các trường thông tin khác cần chỉnh sửa -->
        <button type="submit" class="btn btn-primary">Thêm khóa học</button>
        </form>
      </div>
    </div>
  </div>
</div>
