<!-- Modal sửa khóa học -->
<div class="modal fade" id="editCourse" tabindex="-1" role="dialog" aria-labelledby="editCourseLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editCourseLabel">Sửa khóa học</h5>
                <button type="button" class="close" onclick="$('#editCourse').modal('hide');" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Form sửa khóa học  -->
                <form action="/QuanLiTrungTamTA/course/edit" method="POST" enctype="multipart/form-data">

                <div class="form-group">
                    <label for="course_id">Khóa học:</label>
                    <input type="text" class="form-control" name="course_id" value="<?php echo $course['course_id']?>" readonly>
                </div>

                <div class="form-group">
                    <label for="titleCourse">Tiêu đề:</label>
                    <input type="text" class="form-control" name="titleCourse" value="<?php echo $course['title']?>">
                </div>

                <div class="form-group">
                    <label for="description">Mô tả:</label>
                    <textarea type="text" class="form-control" name="description"> <?php echo $course['description']?></textarea>
                </div>

                <div class="form-group">
                    <label for="duration">Thời lượng:</label>
                    <div class="input-group">
                        <input type="number" class="form-control" name="duration" value="<?php echo $course['duration']?>">
                        <div class="input-group-append">
                            <span class="input-group-text">Tháng</span>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="price">Giá khóa học:</label>
                    <div class="input-group">
                        <input type="number" class="form-control" name="price" value="<?php echo $course['price']?>">
                        <div class="input-group-append">
                        <span class="input-group-text">VND</span>
                        </div>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="start_date">Ngày bắt đầu:</label>
                    <input type="date" class="form-control" name="start_date" value="<?php echo $course['start_date']?>">
                </div>

                <div class="form-group">
                    <label for="end_date">Ngày kết thúc:</label>
                    <input type="date" class="form-control" name="end_date" value="<?php echo $course['end_date']?>">
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
                <button type="submit" class="btn btn-primary">Lưu</button>
                </form>
            </div>
        </div>
    </div>
</div>


